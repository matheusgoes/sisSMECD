@extends('adminlte::page')

@section('title', 'Cadastrar Aluno')

@section('content_header')
    <h1>Editar Aluno</h1>
@stop

@section('content')
  <div class="box" style="padding: 10px;">
    <h4>Por favor preencha o formulário abaixo:</h4>

    <form name="submit_form" class="form" action="{{ URL::to('/alunos/editar/') }}/{{ $aluno->id }}" onsubmit="return validateForm()"  method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
        <table>
          <tr>
            <td><label for="nome">Nome</label></td>
            <td><input class="form-control-plaintext col-md-12"  type="text" name="nome" placeholder="Nome (Obrigatório)" value="{{ $aluno->nome }}"></td>
          </tr>
          <tr>
              <td><label for="serie">Série</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name="serie" placeholder="Serie (Obrigatório)" value="{{ $aluno->serie }}"></td>
          </tr>
          <tr>
              <td><label for="escola">Escola</label></td>
              <td><input  class="form-control-plaintext col-md-12" type="text" name=escola placeholder="Escola (Obrigatório)" value="{{ $aluno->escola }}"></td>
          </tr>
          <tr>
              <td><label for="turno" >Turno</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=turno placeholder="Turno" value="{{ $aluno->turno }}"></td>
          </tr>
          <tr>
              <td><label for="documento">Documento</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=documento placeholder="Documento (Obrigatório)" value="{{ $aluno->doc }}"></td>
          </tr>
          <tr>
              <td><label for="residencia">Reside em</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=residencia placeholder="Reside em" value="{{ $aluno->residencia }}"></td>
          </tr>
          <tr>
              <td><label for="rota">Rota</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=rota placeholder="Rota" value="{{ $aluno->rota }}"></td>
          </tr>
          <tr>
              <td><label for="data_nasc">Data de Nascimento</label></td>
              <td><div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name=data_nasc placeholder="Data de Nascimnento (Obrigatório)" type="text" class="form-control pull-right" class="datepicker" id="datepicker" value="{{ $aluno->data_nasc }}">
                      </div>
              </td>
          </tr>
          <tr>
              <td><label for="mae">Mãe</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=mae placeholder="Mãe (Obrigatório)" value="{{ $aluno->mae }}"></td>
          </tr>
          <tr>
              <td><label for="pai">Pai</label></td>
              <td><input class="form-control-plaintext col-md-12" type="text" name=pai placeholder="Pai" value="{{ $aluno->pai }}"></td>
          </tr>
          <tr>
              <td><label for="photo">Foto</label></td>
              <td><input type="file" name="photo" id="photo"></td>
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
        var serie = document.forms["submit_form"]["serie"].value;
        var escola = document.forms["submit_form"]["escola"].value;
        var documento = document.forms["submit_form"]["documento"].value;
        var data_nasc = document.forms["submit_form"]["data_nasc"].value;
        var mae = document.forms["submit_form"]["mae"].value;

        if (nome == "" || documento =="" || serie =="" || escola == "" || mae == "" || data_nasc == "" ) {
            alert("Os campos nome, serie, escola, documento, data de nascimento, e nome da mãe são de preenchimento OBRIGATÓRIO !!!");
            return false;
        }
    }
  </script>
  @stop
