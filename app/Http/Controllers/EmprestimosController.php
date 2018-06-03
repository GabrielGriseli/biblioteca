<?php

namespace App\Http\Controllers;

use App\emprestimo;
use App\user;
use App\livro;
use Request;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmprestimosRequest;

class EmprestimosController extends Controller
{
    public function create(){
        $usuarios = User::all();
        $livros = Livro::all();

        return view('emprestimos.create', ['usuario'=> 'teste', 'usuarios'=>$usuarios, 'livros'=>$livros]);
    }

    public function store(){

        $usuario = User::where('name', Request::input('usuario'))->first();
        $livro = Livro::where('nome', Request::input('livro'))->first();

        $emprestimo = new \stdClass();
        $emprestimo->id_usuario = $usuario->id;
        $emprestimo->id_livro = $livro->id;

        Emprestimo::create(array('id_usuario' => $usuario->id, 'id_livro' => $livro->id));

        $usuarios = User::all();
        $livros = Livro::all();
        
        return view('emprestimos.create', ['usuario'=> $usuario->id, 'usuarios'=>$usuarios, 'livros'=>$livros]);
    }
}
