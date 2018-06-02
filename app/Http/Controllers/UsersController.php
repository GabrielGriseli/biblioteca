<?php

namespace App\Http\Controllers;

use App\user;
use Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        
        if (Auth::user()->admin == 2){
            $usuarios = User::all();
            return view('users.index', ['usuarios'=>$usuarios]);
        }
        else{
            $usuarios = User::all();
            $vetUsuarios = [];
            foreach($usuarios as $i ) {
                if ($i->admin == 0)
                    array_push($vetUsuarios, $i);
            }
            return view('users.index', ['usuarios'=>$vetUsuarios]);
        }
    }

    public function edit($id){
        $usuario = User::find($id);
        return view('users.edit', compact('usuario'));
    }

    public function update($id){

        $usuario = User::find($id);
        $usuario->admin = Request::input('admin');
        $usuario->save();
        
        return redirect()->route('users');
    }
}
