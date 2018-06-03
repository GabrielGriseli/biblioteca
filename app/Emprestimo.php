<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = ['id_usuario', 'id_livro', 'devolucao'];
}
