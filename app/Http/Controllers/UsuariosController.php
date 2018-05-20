<?php

namespace App\Http\Controllers;

use App\usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        return view('usuarios.index', ['usuarios'=>$usuarios]);
        }
  
      public function create(){
        return view('usuarios.create');
      }
  
      public function store(UsuarioRequest $request){
        $novo_usuario = $request->all();
        Usuario::create($novo_usuario);
      
        return redirect()->route('usuarios');
      }
  
      public function visualizar($id){
        $usuario = Usuario::find($id);
        return view('usuarios.visualizar', ['usuario'=>$usuario]);
      }
  
      public function destroy($id){
        Usuario::find($id)->delete();
        return redirect()->route('usuarios');
      }
    
      public function edit($id){
        $usuario = Usuario::find($id);
        return view('usuarios.edit', compact('usuario'));
      }
    
      public function update(UsuarioRequest $request, $id){
        $usuario = Usuario::find($id)->update($request->all());
        return redirect()->route('usuarios');
      }
}
