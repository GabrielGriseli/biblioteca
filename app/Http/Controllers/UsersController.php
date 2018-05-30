<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
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
}
