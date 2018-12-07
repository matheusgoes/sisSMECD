@extends('adminlte::page')

@section('title', 'Cadastrar Ordem de Serviço')

@section('content_header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<h1>Cadastrar Ordem de Serviço</h1>
@stop

@section('content')
<div class="box" style="padding: 10px;">
  <h4>Por favor preencha o formulário abaixo:</h4>
  <div id="erro"></div>
  <form name="submit_form" class="form" action="{{ URL::to('/ordens/cadastrar') }}" onsubmit="return validateForm()"  method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table>
      <tr>
        <td> <br> </td>
      </tr>
      <tr>
        <td><label for="enviados">Modelos enviados * </label></td>
        <td>
          <div class="form-group">
            <table class="table table-bordered table-hover dataTable" id="tonners-table">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Escola</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            </table>
          </div>
        </td>
      </tr>
      <tr>
        <td> <br> </td>
      </tr>
      <tr>
        <td><label for="data_envio">Data de Envio *</label></td>
        <td><div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name=data_envio placeholder="Data de Envio (Obrigatório)" type="text" class="form-control pull-right" class="datepicker" id="datepicker">
                </div>
        </td>
      </tr><tr>
        <td> <br> </td>
      </tr>
      <tr>
            <td><label for="obs">Observações</label></td>
            <td><input  class="form-control-plaintext col-xs-12" type="text" name=obs placeholder="Observações"></td>
         </tr>
      <tr>
        <td> <br> </td>
      </tr>
      <tr>
        <td></td>
        <td>  <center> <input class="btn btn-primary mb-2" type="submit" value="Registrar!"> </center></td>
      </tr>
    </table>
  </form>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script>

$(function () {
  $('#tonners-table').DataTable({
    "processing": true,
      "serverSide": true,
      "ajax": "/tonners/load",
      columns: [
      { data: 'modelo', name: 'modelo' },
      { data: 'escola', name: 'escola' },
      {
        "render": function (data, type, JsonResultRow, meta) {
          return '<input type="hidden" name=ids[]" value="'+JsonResultRow.id+'" ><input  class="form-control-plaintext col-xs-12" type="text" name="qtd[]"" placeholder="Quantidade de tonners (Obrigatório)">';
        }
      }
  ]
  });
});

function validateForm() {
  var enviados = document.forms["submit_form"]["id"].value;
  console.log(enviados);
  var qtd = document.forms["submit_form"]["qtd"].value;
  var data_envio = document.forms["submit_form"]["data_envio"].value;
  // $('#enviados option:selected').each(function() {
  //     alert($(this).val());
  // });
  if (enviados == "" || data_envio == "") {
    alert("Os campos Modelos Enviados e Data de envio são de preenchimento OBRIGATÓRIO !!!");
    document.getElementById('erro').innerHTML =   '<p style="background-color: lightgrey: ; border-left: 6px solid red; padding:2px;">Preencha os campos obrigatórios. Os campos obrigatórios possuem um * ao lado do nome.</p>';
    return false;
  }
}
</script>
@stop
