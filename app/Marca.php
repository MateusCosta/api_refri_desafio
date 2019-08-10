<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    public $primaryKey = 'id';
    public $timestamps = true;

    //relacionamento
    public function produtos(){
        $this->hasMany('App\Produto');
    }
}
