@extends('layout.principal')
@section('conteudo')
<div class="container">
    <h2>Categorias</h2>     

    @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}"> 
        {!! session('message.content') !!}
    </div>
    @endif

    @if( Session::has('sucess') )
    <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
        {{Session::get('sucess')}}
    </div>
    @endif


    <table id="listagem" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome Categoria</th>
                <th>Editar Categoria</th>
                <th>Exibir Categoria</th>
                <th>Deletar Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $c)
            <tr>
                <td>{{ $c->id_categoria }}</td>
                <td>{{ $c->nome }}</td>
                <td><a href="{{route('listar.edit', $c->id_categoria)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                <td><a href="{{route('listar.show', $c->id_categoria)}}"><span class="glyphicon glyphicon-eye-open"></span></a></td>    
                <!--<td><a href="/ListarCategoria/mostrar/{{ $c->id_categoria }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td><a href="/ListarCategoria/remove/{{ $c->id_categoria }}"><span class="glyphicon glyphicon-trash"></span></a></td> -->
            </tr>     

            @endforeach
        </tbody>
    </table>
</div>
@stop