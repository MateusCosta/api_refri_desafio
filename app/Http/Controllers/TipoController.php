<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
use App\Http\Resources\Tipo AS TipoResource;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return TipoResource::collection($tipos);
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
        if (!$request->has('tipo')) {
            return response("Campos incorretos", 400);
        }
        $this->validate($request,[
            'tipo' => 'required'
        ]);

        $unique = Tipo::where(['tipo' => $request->input('tipo')])->get()->count();
        if($unique>0){
            return response("Tipo já cadastrado", 400);
        }

       
        $tipo = new Tipo();
        $tipo->tipo = $request->input('tipo');
       
        if($tipo->save()){
            return new TipoResource($tipo);
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
       $tipo = Tipo::findOrFail($id);
       return new TipoResource($tipo);
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
        if (!$request->has('tipo')) {
            return response("Campos incorretos", 400);
        }

        $this->validate($request,[
            'tipo' => 'required'
             ]);

        $unique = Tipo::where(['tipo' => $request->input('tipo')])->get()->count();
        if($unique>0){
            return response("Tipo já cadastrado", 400);
        }     
       $tipo = Tipo::findOrFail($id);

        $tipo->tipo = $request->input('tipo');
        
        if($tipo->save()){
            return new TipoResource($tipo);
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
        $tipo = Tipo::findOrFail($id);

        if($tipo->delete()){
            return new TipoResource($tipo);
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
        $tipo_id_array = $request->input('id');
        $tipos = Tipo::whereIn('id', $tipo_id_array)->get();
        if(!count($tipos)){
            abort(404);
        }
        $tipos->each(function ($tipos, $key) {
            $tipos->delete();
        });
       
            return $tipos;
       
        
    }
}
