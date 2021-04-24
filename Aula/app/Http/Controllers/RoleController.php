<?php

namespace App\Http\Controllers;
use Spatie\Permission\Model\Role;
use Spatie\Permission\Model\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use DB;
use Hash;

class RoleController extends Controller
{

    public function __construct(){

        $this->middleware(  'permission: role-list|role-create|role-edit|role-delete',
                            ['only' => ['index', 'store', 'create']]);

        $this->middleware(  'permission: role-create', ['only' => ['create', 'store']]);
        $this->middleware(  'permission: role-edit', ['only' => ['edit', 'update']]);
        $this->middleware(  'permission: role-delete', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginacao = 5;
        $roles = Role::orderBy('id', 'DESC')->paginate($paginacao);

        return view('roles.index',
                compact('roles'))->
                    with('i', ($request->input('page', 1) - 1 * $paginacao));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();

        return view('roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 'name' => 'required|unique:roles,name',
                                    'permission' => 'required']);

        $role = Role::create(['name' => $request->input('name')]);

        // Atualizando/sicronizando o perfil
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success', 'Perfil criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $role = Role::find($id);

       $rolePermissions = Permission::join('role_has_permissions',
                                            'role_has_permissions.permission.id',
                                            '=',
                                            'permission.id')->where('role_has_permissions.role_id', $id)->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();

        $rolePermissions = DB::table('role_has_permissions')->
                            where('role_has_permissions.role_id', $id)->
                            pluck('role_has_permissions.permission_id')->all();

        return view('role.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [ 'name' => 'required|unique:roles,name',
                                    'permission' => 'required']);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success', 'Perfil atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // apagando com o banco direto
       DB::table('roles')->where('id',$id)->delete();
       return redirect()->route('roles.index')->with('success', 'Perfil deletado com sucesso');
    }
}
