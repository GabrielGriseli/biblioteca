@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    
@stop

@section('content')

    

    <div class="box-header with-border">
        <h1 class="box-title">Cadastro de Livro</h1>
    </div>
    {!! Form::open(['route' => 'livros.store']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('autor', 'Autor') !!}
                {!! Form::text('autor', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('editora', 'Editora') !!}
                {!! Form::text('editora', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ano', 'Ano') !!}
                {!! Form::text('ano', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('isbn', 'ISBN') !!}
                {!! Form::text('isbn', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descricao', 'Descrição') !!}
                {!! Form::textarea('descricao', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <a href="/livros" class="btn btn-danger">Cancelar</a>
                {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
            </div>
    {!!Form::close() !!}

    
          
@stop