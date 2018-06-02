<?php

namespace App\Http\Controllers;

use App\livro;
use App\autor;
use App\editora;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LivroRequest;
use Illuminate\Support\Facades\Auth;

class LivrosController extends Controller
{
    public function index(){
      $livros = Livro::all();

      $vet = [];
      if(!empty($livros)){
        foreach($livros as $i ) {
          $autor = Autor::find($i->id_autor);
          $editora = Editora::find($i->id_editora);

          array_push($vet, [$i, $autor, $editora]);
        }
      }

      if (Auth::check() && Auth::user()->admin == 2)
        return view('livros.index', ['vet'=>$vet]);
      else
        return view('livros.indexUser', ['vet'=>$vet]); 
    }

    public function create(){
      return view('livros.create');
    }

    public function store(LivroRequest $request){
      $novo_livro = $request->all();
      Livro::create($novo_livro);
    
      return redirect()->route('livros');
    }

    public function visualizar($id){
      $livro = Livro::find($id);
      $autor = Autor::find($livro->id_autor);
      $editora = Editora::find($livro->id_editora);

      return view('livros.visualizar', ['livro'=>$livro, 'autor'=>$autor, 'editora'=>$editora]);
    }

    public function destroy($id){
      Livro::find($id)->delete();
      return redirect()->route('livros');
    }
  
    public function edit($id){
      $livro = Livro::find($id);
      $autor = Autor::find($livro->id_autor);
      $editora = Editora::find($livro->id_editora);

      return view('livros.edit', ['livro'=>$livro, 'autor'=>$autor, 'editora'=>$editora]);
    }
  
    public function update(LivroRequest $request, $id){
      $livro = Livro::find($id)->update($request->all());
      return redirect()->route('livros');
    }
}
