<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class ClientesController extends Controller
{

    use HasRoles;

    //Forma de controlar o acesso

    /*
    public function __construct(){
        $this->middleware('permission:cliente-list',['only' => ['index', 'show']]);
        $this->middleware('permission:cliente-create',['only' => ['create', 'store']]);
        $this->middleware('permission:cliente-edit',['only' => ['edit', 'update']]);
        $this->middleware('permission:cliente-delete',['only' => ['destroy']]);
    }*/

    public function listar(){
        $clientes = Cliente::all();

        return view('clientes.listar', ['clientes' => $clientes]);
    }

    public function index(Request $request)
    {
        $paginacao = 5;
        $data = Cliente::orderBy('id', 'DESC')->paginate($paginacao);

        return view('clientes.index',
                compact('data'))->
                    with('i', ($request->input('page', 1) - 1 * $paginacao));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = Role::pluck('name', 'name')->all();
        return view('clientes.create')->with('roles', compact($roles));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
                        ['nome' => 'required',
                         'email' => 'required|email|unique:tb_cliente,email',
                         'roles' => 'required']);

        $input = $request->all();

        $cliente = Cliente::create($input);

        $cliente->assingRole($request->input('roles'));

        return redirect()->route('clientes.index')->with('success', 'Usuário criado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        $roles = Role::pluck('name', 'name')->all();

        $clienteRole = $cliente->roles->pluck('name', 'name')->all();

        return view('clientes.edit', compact('cliente', 'roles', 'clienteRole'));
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
        $this->validate($request,
                        ['nome' => 'required',
                         'email' => 'required|email|unique:tb_cliente,email',
                         'roles' => 'required']);


        $input = $request->all();
        $cliente = Cliente::find($id);
        $cliente->update($input);

        //Consulta sem Model - apagando as roles
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        // salvando as roles
        $cliente->assignRole($request->input('roles'));

        //redirecionando
        return redirect()->route('clientes.index')->with('success', 'Usuário atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::find($id)->delete();
        return redirect()->route('clientes.index')->with('success', "Cliente $id apagado com sucesso");
    }
}
