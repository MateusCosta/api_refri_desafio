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
        $produtos = Produto::where('ativo', 1)->get();
        foreach ($produtos as $produto){

            $produto->marca = $produto->marca->marca;
            $produto->marca = $produto->sabor->sabor;
            $produto->marca = $produto->unidade->unidade;
            $produto->marca = $produto->tipo->tipo;
        
        }
        return ProdutoResource::collection($produtos);
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
        //validacao
        $this->validate($request,[
            'marca_id' => 'required',
            'tipo_id' => 'required',
            'sabor_id' => 'required',
            'user_id' => 'required',
            'unidade_id' => 'required',
            'quantidade' => 'required',
            'preco' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){

            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        

        $produto = new Produto();
        $produto->marca_id = $request->input('marca_id');
        $produto->tipo_id = $request->input('tipo_id');
        $produto->sabor_id = $request->input('sabor_id');
        $produto->user_id = $request->input('user_id');
        $produto->unidade_id = $request->input('unidade_id');
        $produto->user_id = $request->input('user_id');
        $produto->quantidade = $request->input('quantidade');
        $produto->preco = $request->input('preco');
        $produto->cover_image = $fileNameToStore;
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
        //validacao
        $this->validate($request,[
            'marca_id' => 'required',
            'tipo_id' => 'required',
            'sabor_id' => 'required',
            'user_id' => 'required',
            'unidade_id' => 'required',
            'quantidade' => 'required',
            'preco' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){

            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        

        $produto = Produto::findOrFail($id);

        $produto->marca_id = $request->input('marca_id');
        $produto->tipo_id = $request->input('tipo_id');
        $produto->sabor_id = $request->input('sabor_id');
        $produto->user_id = $request->input('user_id');
        $produto->unidade_id = $request->input('unidade_id');
        $produto->user_id = $request->input('user_id');
        $produto->quantidade = $request->input('quantidade');
        $produto->preco = $request->input('preco');
        
        if($request->hasFile('cover_image')){
        $produto->cover_image = $fileNameToStore;
        }
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
        $produtos = Produto::whereIn('id', $produto_id_array)->get();
        if(!count($produtos)){
            abort(404);
        }
        $produtos->each(function ($produto, $key) {
            $produto->delete();
        });
       
            return $produtos;
       
        
    }

    /**
     * Display the specified resource with this fields.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request){
      
        $produto = Produto::where([
            ['marca_id', $request->input('marca_id')],
            ['sabor_id', $request->input('sabor_id')],
            ['unidade_id', $request->input('unidade_id')],
            ['tipo_id', $request->input('tipo_id')]
            ])->get();

        return ProdutoResource::collection($produto);
        
    }
}
