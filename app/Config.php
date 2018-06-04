<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['num_dias', 'num_renov', 'num_livros', 'multa'];

}
