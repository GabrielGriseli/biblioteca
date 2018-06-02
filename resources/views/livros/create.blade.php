@extends('adminlte::page')

@section('title', 'Livro')

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
                {!! Form::label('id_autor', 'Autor') !!}
                {!! Form::select('id_autor', \App\Autor::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('id_editora', 'Editora') !!}
                {!! Form::select('id_editora', \App\Editora::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control']) !!}
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