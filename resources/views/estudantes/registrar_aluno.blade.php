@extends('adminlte::page')

@section('title', 'Cadastrar Aluno')

@section('content_header')
    <h1>Cadastrar Aluno</h1>
@stop

@section('content')
  <div class="box" style="padding: 10px;">
    <h4>Por favor preencha o formulário abaixo:</h4>

    <form class="form" action="{{ URL::to('/alunos/cadastrar') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
        <table>
          <tr>
            <td><label for="nome">Nome</label></td>
            <td><input class="form-control-plaintext col-md-12"  type="text" name="nome" placeholder="nome"></td>
          </tr>
          <tr>
              <td><label for="serie">Série</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name="serie" placeholder="serie"></td>
          </tr>
          <tr>
              <td><label for="escola">Escola</label></td>
              <td><input  class="form-control-plaintext col-md-12" type="text" name=escola placeholder="escola"></td>
          </tr>
          <tr>
              <td><label for="turno" >Turno</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=turno placeholder="Turno"></td>
          </tr>
          <tr>
              <td><label for="documento">Documento</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=documento placeholder="documento"></td>
          </tr>
          <tr>
              <td><label for="residencia">Reside em</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=residencia placeholder="Reside em"></td>
          </tr>
          <tr>
              <td><label for="rota">Rota</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=rota placeholder="rota"></td>
          </tr>
          <tr>
              <td><label for="data_nasc">Data de Nascimento</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=data_nasc placeholder="Data de Nascimnento"></td>
          </tr>
          <tr>
              <td><label for="mae">Mãe</label></td>
              <td><input class="form-control-plaintext col-md-12"  type="text" name=mae placeholder="Mãe"></td>
          </tr>
          <tr>
              <td><label for="pai">Pai</label></td>
              <td><input class="form-control-plaintext col-md-12" type="text" name=pai placeholder="Pai"></td>
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
  @stop
