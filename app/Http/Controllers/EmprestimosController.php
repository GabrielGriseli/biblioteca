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
        $config = Config::find(1)->num_livros;

        return view('emprestimos.create', ['usuario'=> '', 'usuarios'=>$usuarios, 'livros'=>$livros, 'config'=>$config]);
    }

    public function store(){

        $usuario = User::where('name', Request::input('usuario'))->first();
        $usuario->num_livros++;
        $usuario->save();

        $livro = Livro::where('nome', Request::input('livro'))->first();
        $livro->status = 1;
        $livro->save();

        $dias = Config::find(1)->num_dias;
        $devolucao = Carbon::now()->addDays($dias);

        $emprestimo = Emprestimo::create(array('id_usuario' => $usuario->id, 'id_livro' => $livro->id, 'devolucao'=> $devolucao));
        $data = $devolucao->toFormattedDateString();

        
        return view('emprestimos.comprovante', ['numero'=> $emprestimo->id, 'usuario'=>$usuario->name, 'livro'=>$livro->nome, 'data'=>$data]);
    }

    public function index(){

        $emprestimos = Emprestimo::all()->where('efetiva_devolucao', NULL);

        $devolucoes = array();

        foreach($emprestimos as $emprestimo){
            $usuario = User::find($emprestimo->id_usuario)->name;
            $livro = Livro::find($emprestimo->id_livro)->nome;
            
            $diferenca = Carbon::now()->diffInDays($emprestimo->devolucao, false) + 1;
            if ($diferenca >= 0)
                $multa = "-";
            else{
                $multa = -$diferenca * Config::find(1)->multa;
            }

            array_push($devolucoes, ["id"=>$emprestimo->id, "usuario"=>$usuario, "livro"=>$livro, "multa"=>$multa]);
        }

        return view('emprestimos.devolucao', ['devolucoes'=>$devolucoes]);
    }

    public function comprovante2($id){

        $emprestimo = Emprestimo::find($id);
        $emprestimo->efetiva_devolucao = Carbon::now();
        $emprestimo->save();

        $usuario = User::find($emprestimo->id_usuario);
        $usuario->num_livros--;

        $diferenca = Carbon::now()->diffInDays($emprestimo->devolucao, false) + 1;
        if ($diferenca >= 0)
            $multa = 0;
        else{
            $multa = -$diferenca * Config::find(1)->multa;
        }
        $usuario->multa += $multa;

        $usuario->save();

        $livro = Livro::find($emprestimo->id_livro);
        $livro->status = 0;
        $livro->save();
        
        $devolucao = Carbon::now()->toFormattedDateString();

        return view('emprestimos.comprovante2', ["id"=>$id, "usuario"=>$usuario->name, "livro"=>$livro->nome, "data"=>$devolucao]);
    }
}
