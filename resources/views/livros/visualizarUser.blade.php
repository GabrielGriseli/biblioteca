@extends('adminlte::page')

@section('title', 'Livro')

@section('content_header')
    
@stop

@section('content')

    

    <div class="box-header with-border">
        <h1 class="box-title">Livro</h1>
    </div>

            <div class="form-group">
                {!! Form::label('nome', 'Nome: ') !!}
                {{$livro->nome}}
            </div>
            <div class="form-group">
                {!! Form::label('autor', 'Autor: ') !!}
                {{$autor->nome}}
            </div>
            <div class="form-group">
                {!! Form::label('editora', 'Editora: ') !!}
                {{$editora->nome}}
            </div>
            <div class="form-group">
                {!! Form::label('ano', 'Ano: ') !!}
                {{$livro->ano}}
            </div>
            <div class="form-group">
                {!! Form::label('isbn', 'ISBN: ') !!}
                {{$livro->isbn}}
            </div>
            <div class="form-group">
                {!! Form::label('descricao', 'Descrição: ') !!}
                {{$livro->descricao}}
            </div>

            <a href="/livros" class="btn-sm btn-primary">Voltar</a>

@stop