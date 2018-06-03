@extends('adminlte::page')

@section('title', 'Emprestimo')

@section('content_header')
    
@stop

@section('content')

    <div class="box-header with-border">
        <h1 class="box-title">Emprestimo de livros</h1>
    </div>

    {!! Form::open(['route' => 'emprestimos.store']) !!}

        <!--Usuário-->
        <div class="form-group">
            <div class="col-md-11" style="padding-right: 0px">
                {!! Form::label('usuario', 'Usuário') !!}
                {!! Form::text('usuario', $usuario, ['class'=>'form-control']) !!}
            </div>
            <div class="col-md-1" style="margin-top: 25px; padding-left: 3px">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="open">Pesquisar</button>
            </div>
        
            <div class="form-group">
                <div class="col-md-11" style="padding-right: 0px">
                    {!! Form::label('livro', 'Livro') !!}
                    {!! Form::text('livro', null, ['class'=>'form-control']) !!}
                </div>
                <div class="col-md-1" style="margin-top: 25px; padding-left: 3px">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLivro" id="open">Pesquisar</button>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 25px;">
                <a href="/home" class="btn btn-danger">Cancelar</a>
                {!! Form::submit('Retirar', ['class'=>'btn btn-success']) !!}
            </div>
        </div>
        

        <!--Modal Usuário-->
        <div class="modal" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title">Pesquisar Pessoa</h1>
                    </div>

                    <div class="modal-body">
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
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($usuarios as $i)
                                        <tr data-url>
                                            <td>{{$i->name}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success" onclick="changeUser('{{$i->name}}')" data-dismiss="modal">Selecionar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal Livro-->
        <div class="modal" tabindex="-1" role="dialog" id="modalLivro">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title">Pesquisar Livro</h1>
                    </div>

                    <div class="modal-body">
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
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($livros as $i)
                                        <tr data-url>
                                            <td>{{$i->nome}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success" onclick="changeLivro('{{$i->nome}}')" data-dismiss="modal">Selecionar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        
    {!!Form::close() !!}
          
@stop

@section('js')

<script>
    function changeUser($argument) {
        document.getElementById('usuario').setAttribute('value', $argument);
    }
    function changeLivro($argument) {
        document.getElementById('livro').setAttribute('value', $argument);
    }
</script>

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