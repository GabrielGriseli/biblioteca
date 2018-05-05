<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    protected $fillable = ['nome'];

    public function livros(){
        return $this->hasMany('App\Livros');
    }
}
