@extends('adminlte::page')

@section('title', 'Autor')

@section('content_header')
    
@stop

@section('content')

    <div class="box-header">
        <h1 class="box-title">Emprestimos</h1>
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
                                <th style="width:15%">Empréstimo Id</th>
                                <th style="width:35%">Usuario</th>
                                <th style="width:35%">Livro</th>
                                <th style="width:15%">Multa</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                <tbody>
                @foreach($devolucoes as $i)
                    <tr data-url>
                        <td>{{$i["id"]}}</td>
                        <td>{{$i["usuario"]}}</td>
                        <td>{{$i["livro"]}}</td>
                        <td>{{$i["multa"]}}</td>
                        <td><a href="{{route('emprestimos.comprovante2', ['id'=>$i['id']])}}" class="btn-sm btn-success">Devolver</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <a href="/home" class="btn-sm btn-primary">Voltar</a>
    
@stop

@section('js')

<script>
    $('.input-sm').keyup(function() {
        var nomeFiltro = $(this).val().toLowerCase();
        $('table tbody').find('tr').each(function() {
            var conteudoCelula = $(this).find('td:second').text();
            var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
            $(this).css('display', corresponde ? '' : 'none');
        });
    });
</script>

@stop