<?php

namespace App\Http\Controllers;

use App\config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;

class ConfigsController extends Controller
{
    public function edit($id){
        $config = Config::find($id);
        return view('configs.edit', compact('config'));
    }

    public function update(ConfigRequest $request, $id){
        $config = Config::find($id)->update($request->all());
        return view('home');
    }
}
