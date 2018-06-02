@extends('adminlte::page')

@section('title', 'Autor')

@section('content_header')
    
@stop

@section('content')

    <div class="container">
        <h1>Editando Autor: {{$autor->nome}}</h1>

        {!! Form::open(['route' => ["autores.update", $autor->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', $autor->nome, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                <a href="/autores" class="btn btn-danger">Cancelar</a>
                {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
            </div>


        {!!Form::close() !!}

    </div>
          
@stop