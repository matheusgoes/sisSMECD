@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
@stop

@section('content')

<div class="box" style="padding: 10px;">
  <h4>
    Alunos Cadastrados
    <a style="float: right; margin-left: 10px;" class="btn btn-primary" role="button" onclick="print()">Imprimir</a>
    <a style="float: right;" class="btn btn-info" role="button" href="/alunos/cadastrar">Cadastrar</a>
  </h4>
  <br>
  <table class="table table-bordered table-hover dataTable" id="alunos-table">
    <thead>
      <tr>
        <th>X</th>
        <th>Foto</th>
        <th>Nome</th>
        <th>Série</th>
        <th>Escola</th>
        <th>Turno</th>
        <th>Mãe</th>
        <th>Pai</th>
        <th>Documento</th>
        <th>Data de Nascimento</th>
        <th>Reside em</th>
        <th>Rota</th>
        <th>id</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>X</th>
        <th>Foto</th>
        <th>Nome</th>
        <th>Série</th>
        <th>Escola</th>
        <th>Turno</th>
        <th>Mãe</th>
        <th>Pai</th>
        <th>Documento</th>
        <th>Data de Nascimento</th>
        <th>Reside em</th>
        <th>Rota</th>
        <th>id</th>
      </tr>
    </tfoot>
  </table>

</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</script>
<script type="text/javascript">
function print(){
  var ids = $('.checkboxes:checkbox:checked').map(function() {
    return this.value;
  }).get();
  var args = ids.join("-");
  if (args=="") {
    window.location="/alunos/pdf/";
  }else{
    window.location="/alunos/pdf2/"+ args;
  }
}

$(function () {

  $('#alunos-table').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "{{action('AlunoController@load') }}",
    columns: [
      {
        "render": function (data, type, JsonResultRow, meta) {
          return ' <input class="checkboxes" type="checkbox" name="'+JsonResultRow.id+'" value="'+JsonResultRow.id+'"><br>';
        }
      },
      {
        "render": function (data, type, JsonResultRow, meta) {
          return '<image img src="/img/fotos/alunos/'+JsonResultRow.foto+'" alt="foto" height="60px" width="60px"></image>';
        }
      },
      { data: 'nome', name: 'nome' },
      { data: 'serie', name: 'serie' },
      { data: 'escola', name: 'escola' },
      { data: 'turno', name: 'turno' },
      { data: 'mae', name: 'mae' },
      { data: 'pai', name: 'pai' },
      { data: 'doc', name: 'doc' },
      { data: 'data_nasc', name: 'data_nasc' },
      { data: 'residencia', name: 'residencia' },
      { data: 'rota', name: 'rota' },
      {
        "render": function (data, type, JsonResultRow, meta) {
          return '<a class="btn btn-default" role="button" href="/alunos/editar/'+JsonResultRow.id+'"><i class="fa fa-edit"></i></a> <a class="btn btn-danger" role="button" href="/alunos/delete/'+JsonResultRow.id+'"><i class="fa fa-times"></i></a>';
        }
      }
    ]
  });

});
</script>
@stop
