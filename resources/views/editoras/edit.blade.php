@extends('adminlte::page')

@section('title', 'Editoras')

@section('content_header')
    
@stop

@section('content')

    <div class="container">
        <h1>Editando Editora: {{$editora->nome}}</h1>

        {!! Form::open(['route' => ["editoras.update", $editora->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', $editora->nome, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                <a href="/editoras" class="btn btn-danger">Cancelar</a>
                {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
            </div>

        {!!Form::close() !!}

    </div>

@stop