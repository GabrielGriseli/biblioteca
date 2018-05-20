<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = ['nome', 'id_autor', 'id_editora', 'ano', 'descricao', 'isbn'];
}
