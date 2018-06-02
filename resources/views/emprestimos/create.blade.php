@extends('adminlte::page')

@section('title', 'Emprestimo')

@section('content_header')
    
@stop

@section('content')

    <div class="box-header with-border">
        <h1 class="box-title">Emprestimo de livros</h1>
    </div>

    {!! Form::open(['route' => 'emprestimos.store']) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
        </div>

        <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <label>
                            <p style="margin-left:20px">Pesquisar: 
                                <input class="form-control input-sm" placeholder="" aria-controls="example1" type="search">
                            </p>
                        </label>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row" style="background-color: #C0C0C0">
                                        <th style="width:87%">Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                        <tbody>
                        @foreach($livros as $i)
                            <tr data-url>
                                <td>{{$i->nome}}</td>
                                <td>
                                    Em construção
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
    {!!Form::close() !!}
          
@stop