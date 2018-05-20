<?php

namespace App\Http\Controllers;

use App\editora;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditoraRequest;

class EditorasController extends Controller
{
    public function index(){
        $editoras = Editora::all();
        return view('editoras.index', ['editoras'=>$editoras]);
        }
  
      public function create(){
        return view('editoras.create');
      }
  
      public function store(EditoraRequest $request){
        $novo_editora = $request->all();
        Editora::create($novo_editora);
      
        return redirect()->route('editoras');
      }
  
      public function visualizar($id){
        $editora = Editora::find($id);
        return view('editoras.visualizar', ['editora'=>$editora]);
      }
  
      public function destroy($id){
        Editora::find($id)->delete();
        return redirect()->route('editoras');
      }
    
      public function edit($id){
        $editora = Editora::find($id);
        return view('editoras.edit', compact('editora'));
      }
    
      public function update(EditoraRequest $request, $id){
        $editora = Editora::find($id)->update($request->all());
        return redirect()->route('editoras');
      }
}
