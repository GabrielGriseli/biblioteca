<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = ['nome', 'autor', 'editora', 'ano', 'descricao', 'isbn'];
}
