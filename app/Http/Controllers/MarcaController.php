<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Http\Resources\Marca AS MarcaResource;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return MarcaResource::collection($marcas);
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
        if (!$request->has('nome')) {
            return response("Campos incorretos", 400);
        }
        $this->validate($request,[
            'nome' => 'required'
        ]);

        $unique = Marca::where(['nome' => $request->input('nome')])->get()->count();
        if($unique>0){
            return response("Marca já cadastrada", 400);
        } 
       
        $marca = new Marca();
        $marca->nome = $request->input('nome');
       
        if($marca->save()){
            return new MarcaResource($marca);
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
       $marca = Marca::findOrFail($id);
       return new MarcaResource($marca);
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
        if (!$request->has('nome')) {
            return response("Campos incorretos", 400);
        }
        $this->validate($request,[
            'nome' => 'required'
             ]);

        $unique = Marca::where(['nome' => $request->input('nome')])->get()->count();
        if($unique>0){
         
            return response("Marca já cadastrada", 400);

        } 
       $marca = Marca::findOrFail($id);

        $marca->nome = $request->input('nome');
        
        if($marca->save()){
            return new MarcaResource($marca);
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
        $marca = Marca::findOrFail($id);

        if($marca->delete()){
            return new MarcaResource($marca);
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
        $marca_id_array = $request->input('id');
        $marcas = Marca::whereIn('id', $marca_id_array)->get();
        if(!count($marcas)){
            abort(404);
        }
        $marcas->each(function ($marca, $key) {
            $marca->delete();
        });
       
            return $marcas;
       
        
    }

    
}
