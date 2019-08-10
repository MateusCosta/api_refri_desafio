<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    public $primaryKey = 'id';
    public $timestamps = true;
    
    //relacionamento
    public function produtos(){
        $this->hasMany('App\Produto');
    }
}
