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


    public function __construct(){
        $this->middleware('permission:cliente-list',['only' => ['index', 'show']]);
        $this->middleware('permission:cliente-create',['only' => ['create', 'store']]);
        $this->middleware('permission:cliente-edit',['only' => ['edit', 'update']]);
        $this->middleware('permission:cliente-delete',['only' => ['destroy']]);
    }

    public function getCliente(int $id){

        $cliente = Cliente::find($id);

        return $cliente ?? false;

    }
    public function checkCliente(int $id){

        $cliente = Cliente::all();

        return $cliente ?? false;

    }

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
        return view('clientes.create');

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
                         'email' => 'required|email|unique:tb_cliente,email']);

        $input = $request->all();

       Cliente::create($input);

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

        return view('clientes.edit', compact('cliente'));
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
                        'email' => 'required|email|unique:users,email']);

        $input = $request->all();

        $cliente = Cliente::find($id);

        $cliente->update($input);

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso');
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
