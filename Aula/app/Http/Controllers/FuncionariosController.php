<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function listar(){
        $funcionarios = Funcionario::all();

        return $funcionarios;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $funcionarios = Funcionario::all();

        return Funcionario::all();

        /*
        $paginacao = 7;
        $data = Funcionario::orderBy('id', 'DESC')->paginate($paginacao);

        return view('funcionarios.index',
                compact('data'))->
                    with('i', ($request->input('page', 1) - 1 * $paginacao));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request,
                                ['nome' => 'required',
                                 'endereco' => 'required',
                                 'telefone' => 'required',
                                 'email' => 'required']);*/

        $json = $request->getContent();

        return Funcionario::create(json_decode($json, JSON_OBJECT_AS_ARRAY));

        //return redirect()->route('funcionarios.index')->with('success', 'Funcionario criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);

        if($funcionario){
            return $funcionario;
        }else{
            return json_encode([$id => 'não existe']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionario::find($id);

        return view('funcionarios.edit', compact('funcionario'));
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
        $funcionario = Funcionario::find($id);

        if($funcionario){
            $json = $request->getContent();
            $atu = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $funcionario->nome = $atu['nome'];

            return $funcionario->update() ? [$id => 'atualizado'] : [$id => 'erro'];

        }else{
            return json_encode([$id => 'não existe']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        if($funcionario){
            $ret = $funcionario->delete() ? [$id => 'apagado'] : [$id => 'erro'];
        }else{
            $ret = [$id => 'não existe'];
        }

        return json_encode($ret);

        //return redirect()->route('funcionarios.index')->with('success', "Funcionario $id apagado com sucesso");
    }
}
