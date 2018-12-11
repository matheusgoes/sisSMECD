@extends('adminlte::page')

@section('title', 'Acompanhantes')

@section('content_header')
@stop

@section('content')
<div class="box" style="padding: 10px;">
  <h4>
    Acompanhantes Cadastrados
    <a style="float: right; margin-left: 10px;" class="btn btn-primary" role="button" onclick="print()">Imprimir</a>
    @if (Auth::user()->hasRole("admin"))
      <a style="float: right;" class="btn btn-info" role="button" href="/acompanhantes/cadastrar">Cadastrar</a>
    @endif
  </h4>
  <br>

  <table class="table table-bordered table-hover dataTable" id="acompanhantes-table">
    <thead>
      <tr>
        <th>Selecionar</th>
        <th>Foto</th>
        <th>Nome</th>
        <th>Documento</th>
        <th>Aluno</th>
        <th>Rota</th>
        <th>Turno</th>
        <th>Reside em</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Selecionar</th>
        <th>Foto</th>
        <th>Nome</th>
        <th>Documento</th>
        <th>Aluno</th>
        <th>Turno</th>
        <th>Rota</th>
        <th>Reside em</th>
        <th>Ação</th>
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
    window.location="/acompanhantes/pdf/";
  }else{
    window.location="/acompanhantes/pdf2/"+ args;
  }
}

$(function () {

  $('#acompanhantes-table').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "{{action('AcompanhanteController@load') }}",
    columns: [
      {
        "render": function (data, type, JsonResultRow, meta) {
          return ' <input type="checkbox" name="'+JsonResultRow.foto+'" value="'+JsonResultRow.foto+'"><br>';
        }
      },
      {
        "render": function (data, type, JsonResultRow, meta) {
          return '<image img src="/img/fotos/acompanhantes/'+JsonResultRow.foto+'" alt="foto" height="60px" width="60px"></image>';
        }
      },
      { data: 'nome', name: 'nome' },
      { data: 'doc', name: 'doc' },
      { data: 'aluno', name: 'aluno' },
      { data: 'rota', name: 'rota' },
      { data: 'turno', name: 'turno' },
      { data: 'residencia', name: 'residencia' },
      {
        "render": function (data, type, JsonResultRow, meta) {
          return '@if (Auth::user()->hasRole("admin")) <a class="btn btn-default" role="button" href="/acompanhantes/editar/'+JsonResultRow.id+'"><i class="fa fa-edit"></i></a> <a class="btn btn-danger" role="button" href="/acompanhantes/delete/'+JsonResultRow.id+'"><i class="fa fa-times"></i></a> @endif';
        }
      }
    ]
  });
});
</script>
@stop
