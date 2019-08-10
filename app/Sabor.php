<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sabor extends Model
{
    protected $table = 'sabores';
    public $primaryKey = 'id';
    public $timestamps = true;
    
    //relacionamento
    public function produtos(){
        $this->hasMany('App\Produto');
    }
}
