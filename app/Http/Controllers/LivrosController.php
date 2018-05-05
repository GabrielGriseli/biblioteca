<?php

namespace App\Http\Controllers;

use App\livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LivroRequest;

class LivrosController extends Controller
{
    public function index(){
      $livros = Livro::all();
      return view('livros.index', ['livros'=>$livros]);
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
      return view('livros.visualizar', ['livro'=>$livro]);
    }

    public function destroy($id){
      Livro::find($id)->delete();
      return redirect()->route('livros');
    }
  
    public function edit($id){
      $livro = Livro::find($id);
      return view('livros.edit', compact('livro'));
    }
  
    public function update(LivroRequest $request, $id){
      $livro = Livro::find($id)->update($request->all());
      return redirect()->route('livros');
    }
}
