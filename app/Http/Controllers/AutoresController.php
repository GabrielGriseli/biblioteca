<?php

namespace App\Http\Controllers;

use App\autor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AutorRequest;
use Illuminate\Support\Facades\Auth;

class AutoresController extends Controller
{
  public function index(){

    $autores = Autor::all();

    if (Auth::check() && Auth::user()->admin == 2)
      return view('autores.index', ['autores'=>$autores]);
    else
      return view('autores.indexUser', ['autores'=>$autores]);
  }
  
  public function create(){
    return view('autores.create');
  }

  public function store(AutorRequest $request){
    $novo_autor = $request->all();
    Autor::create($novo_autor);
  
    return redirect()->route('autores');
  }

  public function visualizar($id){
    $autor = Autor::find($id);
    return view('autores.visualizar', ['autor'=>$autor]);
  }

  public function destroy($id){
    Autor::find($id)->delete();
    return redirect()->route('autores');
  }

  public function edit($id){
    $autor = Autor::find($id);
    return view('autores.edit', compact('autor'));
  }

  public function update(AutorRequest $request, $id){
    $autor = Autor::find($id)->update($request->all());
    return redirect()->route('autores');
  }
}