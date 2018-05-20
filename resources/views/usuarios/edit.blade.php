@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    
@stop

@section('content')

    <div class="container">
        <h1>Editando Usuario: {{$usuario->nome}}</h1>

        {!! Form::open(['route' => ["usuarios.update", $usuario->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', $usuario->nome, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cpf', 'CPF') !!}
                {!! Form::text('cpf', $usuario->cpf, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', $usuario->email, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefone', 'Telefone') !!}
                {!! Form::text('telefone', $usuario->telefone, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                <a href="/usuarios" class="btn btn-danger">Cancelar</a>
                {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
            </div>


        {!!Form::close() !!}

    </div>
          
@stop