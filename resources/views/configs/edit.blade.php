@extends('adminlte::page')

@section('title', 'Livro')

@section('content_header')
    
@stop

@section('content')

    
    <div class="container" style="width: 100%">
        <h1>Configurações</h1>

        {!! Form::open(['route' => ["configs.update", $config->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('num_dias', 'Número de dias:') !!}
                {!! Form::text('num_dias', $config->num_dias, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('num_renov', 'Número de renovações:') !!}
                {!! Form::text('num_renov', $config->num_renov, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('multa', 'Multa:') !!}
                {!! Form::text('multa', $config->multa, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                <a href="/home" class="btn btn-danger">Cancelar</a>
                {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
            </div>


        {!!Form::close() !!}

    </div>

    
          
@stop