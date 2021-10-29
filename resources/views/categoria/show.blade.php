@extends('layout.principal')
@section('conteudo')

<form class="form-horizontal" value="{{ csrf_token() }}" method="post" action="{{route('listar.destroy', ['id' => $c->id_categoria])}}">
      <fieldset>

      <!-- Form Name -->
      <legend>Exibir Categoria</legend>

      <!-- Text input-->
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="col-md-4 control-label" for="textinput">Nome</label>  
            <div class="col-md-4">
                <input id="textinput" name="nome" value="{{ $c->nome }}" type="text" disabled="disable" placeholder="Insira nome da categoria" class="form-control input-md" required>  
            </div>
            <input type="hidden" name="id_categoria" value="{{ $c->id_categoria }}">
        </div>

       
      </fieldset>
</form>



@stop