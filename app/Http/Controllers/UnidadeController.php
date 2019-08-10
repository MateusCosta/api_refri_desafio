<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;
use App\Http\Resources\Unidade AS UnidadeResource;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
        return UnidadeResource::collection($unidades);
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

        if (!$request->has('unidade')) {
            return response("Campos incorretos", 400);
        }
        
        $this->validate($request,[
            'unidade' => 'required'
        ]);

        $unique = Unidade::where(['unidade' => $request->input('unidade')])->get()->count();
        if($unique>0){
            return response("Unidade já cadastrada", 400);
        }

       
        $unidade = new Unidade();
        $unidade->unidade = $request->input('unidade');
       
        if($unidade->save()){
            return new UnidadeResource($unidade);
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
       $unidade = Unidade::findOrFail($id);
       return new UnidadeResource($unidade);
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
        if (!$request->has('unidade')) {
            return response("Campos incorretos", 400);
        }
        //validacao
        $this->validate($request,[
            'unidade' => 'required'
             ]);

        $unique = Unidade::where(['unidade' => $request->input('unidade')])->get()->count();
        if($unique>0){
            return response("Unidade já cadastrada", 400);
        }     
       $unidade = Unidade::findOrFail($id);

        $unidade->unidade = $request->input('unidade');
        
        if($unidade->save()){
            return new UnidadeResource($unidade);
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
        $unidade = Unidade::findOrFail($id);

        if($unidade->delete()){
            return new UnidadeResource($unidade);
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
        $unidade_id_array = $request->input('id');
        $unidades = Unidade::whereIn('id', $unidade_id_array)->get();
        if(!count($unidades)){
            abort(404);
        }
        $unidades->each(function ($unidades, $key) {
            $unidades->delete();
        });
       
            return $unidades;
       
        
    }
}
