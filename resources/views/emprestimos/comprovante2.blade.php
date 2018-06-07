@extends('adminlte::page')

@section('title', 'Emprestimo')

@section('content_header')
    
@stop

@section('content')

    <div class="box-header with-border">
        <h1 class="box-title">Comprovante de Devolução</h1>
    </div>

    <div class="form-group">
        {!! Form::label('id', 'Código do devolução: ') !!}
        {{$id}}
    </div>
    <div class="form-group">
        {!! Form::label('usuario', 'Usuario: ') !!}
        {{$usuario}}
    </div>
    <div class="form-group">
        {!! Form::label('livro', 'Livro: ') !!}
        {{$livro}}
    </div>
    <div class="form-group">
        {!! Form::label('data', 'Data de devolução: ') !!}
        {{$data}}
    </div>

    <a href="/emprestimos/index" class="btn btn-danger">Voltar</a>
    <a class="btn btn-success" disabled>Imprimir</a>

@stop