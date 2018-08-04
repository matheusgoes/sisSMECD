@extends('adminlte::page')

@section('title', 'Cadastrar Acompanhante')

@section('content_header')
    <h1>Cadastrar Acompanhante</h1>
@stop

@section('content')

  <div class="box" style="padding: 10px;">
    <h4>Por favor preencha o formulário abaixo:</h4>

    <form class="form" action="{{ URL::to('/acompanhantes/cadastrar') }}" method="post" enctype="multipart/form-data">

      {{ csrf_field() }}
        <label for="nome"  class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
          <input class="form-control-plaintext" type="text" name="nome" placeholder="nome"><br><br>
        </div>

        <label for="documento"  class="col-sm-2 col-form-label">Documento</label>
        <div class="col-sm-10">
          <input class="form-control-plaintext" type="text" name=documento placeholder="documento"><br><br>
        </div>

        <label for="aluno"  class="col-sm-2 col-form-label">Aluno</label>
        <div class="col-sm-10">
          <input class="form-control-plaintext" type="text" name="aluno" placeholder="aluno"><br><br>
        </div>

        <label for="residencia"  class="col-sm-2 col-form-label">Residencia</label>
        <div class="col-sm-10">
          <input class="form-control-plaintext" type="text" name=residencia placeholder="residencia"><br><br>
        </div>

        <label for="rota"  class="col-sm-2 col-form-label">Rota</label>
        <div class="col-sm-10">
          <input class="form-control-plaintext" type="text" name=rota placeholder="rota"><br><br>
        </div>

        <label for="turno"  class="col-sm-2 col-form-label">Turno</label>
        <div class="col-sm-10">
          <input class="form-control-plaintext" type="text" name=turno placeholder="turno"><br><br>
        </div>
        <label for="photo" >Foto</label>
        <input name="photo" type="file" id="photo"> <br>

      <input class="btn btn-primary mb-2" type="submit" value="Registrar!">
    </form>
  </div>
  @stop
