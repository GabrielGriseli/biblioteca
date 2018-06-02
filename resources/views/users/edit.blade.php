@extends('adminlte::page')

@section('title', 'Editoras')

@section('content_header')
    
@stop

@section('content')

    <div class="container">
        <h1>Grau de acesso do usuario: {{$usuario->name}}</h1>

        {!! Form::open(['route' => ["users.update", $usuario->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::text('admin', $usuario->admin, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                <a href="/users" class="btn btn-danger">Cancelar</a>
                {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
            </div>

        {!!Form::close() !!}

    </div>

@stop