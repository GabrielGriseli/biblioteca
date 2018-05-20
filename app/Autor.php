<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = "autores";
    protected $fillable = ['nome'];

    public function livros(){
        return $this->hasMany('App\Livros');
    }
}
