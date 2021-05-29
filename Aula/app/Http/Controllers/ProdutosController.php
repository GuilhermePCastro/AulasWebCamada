<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class ProdutosController extends Controller
{

    public function __construct(){
        $this->middleware('permission:produto-list',['only' => ['index', 'show']]);
        $this->middleware('permission:produto-create',['only' => ['create', 'store']]);
        $this->middleware('permission:produto-edit',['only' => ['edit', 'update']]);
        $this->middleware('permission:produto-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginacao = 7;
        $data = Produto::orderBy('id', 'DESC')->paginate($paginacao);

        return view('produtos.index',
                compact('data'))->
                    with('i', ($request->input('page', 1) - 1 * $paginacao));
    }

    public function getAll(){
        return Produto::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
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
                                 'preco' => 'required']);

        $input = $request->all();

        Produto::create($input);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        return $produto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);

        return view('produtos.edit', compact('produto'));
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
                                 'preco' => 'required']);

        $input = $request->all();

        $produto = Produto::find($id);

        $produto->update($input);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('produtos.index')->with('success', "Produto $id apagado com sucesso");
    }
}
