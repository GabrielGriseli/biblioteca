@extends('adminlte::page')

@section('title', 'Livro')

@section('content_header')
    
@stop

@section('content')

    
    <div class="container" style="width: 100%">
        <h1>Editando Livro: {{$livro->nome}}</h1>

        {!! Form::open(['route' => ["livros.update", $livro->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', $livro->nome, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('id_autor', 'Autor') !!}
                {!! Form::select('id_autor', \App\Autor::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('id_editora', 'Editora') !!}
                {!! Form::select('id_editora', \App\Editora::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) !!}
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