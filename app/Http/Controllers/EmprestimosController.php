<?php

namespace App\Http\Controllers;

use App\emprestimo;
use App\user;
use App\livro;
use App\config;
use Request;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmprestimosRequest;
use Carbon\Carbon;

class EmprestimosController extends Controller
{
    public function create(){
        $usuarios = User::all();
        $livros = Livro::all();

        return view('emprestimos.create', ['usuario'=> '', 'usuarios'=>$usuarios, 'livros'=>$livros]);
    }

    public function store(){

        $usuario = User::where('name', Request::input('usuario'))->first();
        $livro = Livro::where('nome', Request::input('livro'))->first();
        $dias = Config::find(1)->num_dias;
        $devolucao = Carbon::now()->addDays($dias);

        $emprestimo = Emprestimo::create(array('id_usuario' => $usuario->id, 'id_livro' => $livro->id, 'devolucao'=> $devolucao));

        $data = $devolucao->toFormattedDateString();
        
        return view('emprestimos.comprovante', ['numero'=> $emprestimo->id, 'usuario'=>$usuario->name, 'livro'=>$livro->nome, 'data'=>$data]);
    }
}
