@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    
@stop

@section('content')

    
    <div class="container">
        <h1>Editando Livro: {{$livro->nome}}</h1>

        {!! Form::open(['route' => ["livros.update", $livro->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', $livro->nome, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('autor', 'Autor') !!}
                {!! Form::text('autor', $livro->autor, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('editora', 'Editora') !!}
                {!! Form::text('editora', $livro->editora, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ano', 'Ano') !!}
                {!! Form::text('ano', $livro->ano, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('isbn', 'ISBN') !!}
                {!! Form::text('isbn', $livro->isbn, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descricao', 'Descrição') !!}
                {!! Form::textarea('descricao', $livro->descricao, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <a href="/livros" class="btn btn-danger">Cancelar</a>
                {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
            </div>


        {!!Form::close() !!}

    </div>

    
          
@stop