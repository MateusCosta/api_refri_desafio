<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    public $primaryKey = 'id';
    public $timestamps = true;

    //relacionamentos

    public function marca(){
        return $this->belongsTo('App\Marca');
    }

    public function sabor(){
        return $this->belongsTo('App\Sabor');
    }
    public function unidade(){
        return $this->belongsTo('App\Unidade');
    }

    public function tipo(){
        return $this->belongsTo('App\Tipo');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
