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
        <table>
          <tr>
            <td><label for="nome"  class="col-sm-2 col-form-label">Nome</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name="nome" placeholder="nome"></td>
          </tr>
          <tr>
            <td><label for="documento"  class="col-sm-2 col-form-label">Documento</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name=documento placeholder="documento"></td>
          </tr>
          <tr>
            <td><label for="aluno"  class="col-sm-2 col-form-label">Aluno</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name="aluno" placeholder="aluno"></td>
          </tr>
          <tr>
            <td><label for="residencia"  class="col-sm-2 col-form-label">Residencia</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name=residencia placeholder="residencia"></td>
          </tr>
          <tr>
            <td><label for="rota"  class="col-sm-2 col-form-label">Rota</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name=rota placeholder="rota"></td>
          </tr>
          <tr>
            <td><label for="turno"  class="col-sm-2 col-form-label">Turno</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name=turno placeholder="turno"></td>
          </tr>
          <tr>
            <td><label for="photo" class="col-sm-2 col-form-label">Foto</label></td>
            <td><input name="photo" type="file" id="photo"/></td>
          </tr>
          <tr>
            <td></td>
            <td> <center> <input class="btn btn-primary mb-2" type="submit" value="Registrar!"> </center></td>
          </tr>
        </table>
    </form>
  </div>
  @stop
