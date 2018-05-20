<?php

namespace App\Http\Controllers;

use App\emprestimos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmprestimosRequest;

class EmprestimosController extends Controller
{
    public function create(){
        return view('usuarios.create');
    }

    public function store(UsuarioRequest $request){
        $novo_usuario = $request->all();
        Usuario::create($novo_usuario);
      
        return redirect()->route('usuarios');
    }
}
