@extends('adminlte::page')

@section('title', 'Editoras')

@section('content_header')
    
@stop

@section('content')

    <div class="box-header with-border">
        <h1 class="box-title">Cadastro de Editora</h1>
    </div>

    {!! Form::open(['route' => 'editoras.store']) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            <a href="/editoras" class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
        </div>
        
    {!!Form::close() !!}
          
@stop