<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produto;
use App\Http\Resources\Produto AS ProdutoResource;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::paginate(10);

        return ProdutoResource::collection($produto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //not implemented
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->marca = $request->input('marca');
        $produto->tipo = $request->input('tipo');
        $produto->sabor = $request->input('sabor');
        $produto->unidade = $request->input('unidade');
        $produto->quantidade = $request->input('quantidade');
        $produto->preco = $request->input('preco');
        if($produto->save()){
            return new ProdutoResource($produto);
        }
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $produto = Produto::findOrFail($id);
       return new ProdutoResource($produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //not implemented
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
        $produto = Produto::findOrFail($id);
        $produto->marca = $request->input('marca');
        $produto->tipo = $request->input('tipo');
        $produto->sabor = $request->input('sabor');
        $produto->unidade = $request->input('unidade');
        $produto->quantidade = $request->input('quantidade');
        $produto->preco = $request->input('preco');
        if($produto->save()){
            return new ProdutoResource($produto);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        if($produto->delete()){
            return new ProdutoResource($produto);
        }
        
    }
    /**
     * Remove an array of resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        $produto_id_array = $request->input('id');
        $produtos = Produto::whereIn('id',$produto_id_array);
        if($produtos->delete()){
            return new ProdutoResource($produtos);
        }
       
        
    }

    /**
     * Display the specified resource with this fields.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request){
      
        $produto = Produto::where([
            ['marca', $request->input('marca')],
            ['sabor', $request->input('sabor')],
            ['unidade', $request->input('unidade')],
            ['tipo', $request->input('tipo')]
            ])->get();

        return ProdutoResource::collection($produto);
        
    }
}
