@extends('adminlte::page')

@section('title', 'Autor')

@section('content_header')
    
@stop

@section('content')

    <div class="box-header">
        <h1 class="box-title">Autores cadastrados</h1>
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
                            <tr role="row" style="background-color: rgb(55, 72, 80); color: white;">
                                <th style="width:87%">Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                <tbody>
                @foreach($autores as $i)
                    <tr data-url>
                        <td>{{$i->nome}}</td>
                        <td>
                            <a href="{{route('autores.edit', ['id'=>$i->id])}}" class="btn-sm btn-success">Editar</a>
                            <a href="{{route('autores.destroy', ['id'=>$i->id])}}" class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <a href="/home" class="btn-sm btn-primary">Voltar</a>
    <a href="{{route('autores.create')}}" class="btn-sm btn-success">Novo Autor</a>
    
@stop

@section('js')

<script>
    $('.input-sm').keyup(function() {
        var nomeFiltro = $(this).val().toLowerCase();
        $('table tbody').find('tr').each(function() {
            var conteudoCelula = $(this).find('td:first').text();
            var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
            $(this).css('display', corresponde ? '' : 'none');
        });
    });
</script>

@stop