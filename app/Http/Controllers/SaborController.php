<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sabor;
use App\Http\Resources\Sabor AS SaborResource;

class SaborController extends Controller
{
    public function index()
    {
        $sabores = Sabor::all();
        return SaborResource::collection($sabores);
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

        $unique = Sabor::where(['nome' => $request->input('nome')])->get()->count();
        if($unique>0){
            abort(404);
        }

       
        $sabor = new Sabor();
        $sabor->nome = $request->input('nome');
       
        if($sabor->save()){
            return new SaborResource($sabor);
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
       $sabor = Sabor::findOrFail($id);
       return new SaborResource($sabor);
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

        $unique = Sabor::where(['nome' => $request->input('nome')])->get()->count();
        if($unique>0){
            return response("Sabor já cadastrado", 400);
        }     
       $sabor = Sabor::findOrFail($id);

        $sabor->nome = $request->input('nome');
        
        if($sabor->save()){
            return new SaborResource($sabor);
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
        $sabor = Sabor::findOrFail($id);

        if($sabor->delete()){
            return new SaborResource($sabor);
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
        $sabor_id_array = $request->input('id');
        $sabores = Sabor::whereIn('id', $sabor_id_array)->get();
        if(!count($sabores)){
            abort(404);
        }
        $sabores->each(function ($sabor, $key) {
            $sabor->delete();
        });
       
            return $sabores;
       
        
    }
}
