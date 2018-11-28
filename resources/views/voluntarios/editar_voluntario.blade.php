@extends('adminlte::page')

@section('title', 'Cadastrar Voluntário')

@section('content_header')
    <h1>Editar Voluntário</h1>
@stop

@section('content')

  <div class="box" style="padding: 10px;">
    <h4>Por favor preencha o formulário abaixo:</h4>

    <form name="submit_form" class="form" action="{{ URL::to('/voluntarios/editar/') }}/{{ $voluntario->id }}" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">

      {{ csrf_field() }}
        <table>
          <tr>
            <td><label for="nome"  class="col-sm-2 col-form-label">Nome</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name="nome" placeholder="Nome (Obrigatório)" value="{{ $voluntario->nome }}"></td>
          </tr>
          <tr>
            <td><label for="documento"  class="col-sm-2 col-form-label">Documento</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name=documento placeholder="Documento (Obrigatório)" value="{{ $voluntario->doc }}"></td>
          </tr>
          <tr>
            <td><label for="residencia"  class="col-sm-2 col-form-label">Residência</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name=residencia placeholder="Residencia (Obrigatório)" value="{{ $voluntario->residencia }}"></td>
          </tr>
          <tr>
            <td><label for="rota"  class="col-sm-2 col-form-label">Rota</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name=rota placeholder="Rota" value="{{ $voluntario->rota }}"></td>
          </tr>
          <tr>
            <td><label for="turno"  class="col-sm-2 col-form-label">Turno</label></td>
            <td><input class="form-control-plaintext col-md-12" type="text" name=turno placeholder="Turno" value="{{ $voluntario->turno }}"></td>
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

  <script>
    function validateForm() {
        var nome = document.forms["submit_form"]["nome"].value;
        var documento = document.forms["submit_form"]["documento"].value;
        var aluno = document.forms["submit_form"]["aluno"].value;
        var residencia = document.forms["submit_form"]["residencia"].value;

        if (nome == "" || documento =="" || residencia == "") {
            alert("Os campos nome, documento, aluno e residencia são de preenchimento OBRIGATÓRIO !!!");
            return false;
        }
    }
  </script>
  @stop
