@extends('adminlte::page')

@section('title', 'Voluntarios')

@section('content_header')
@stop

@section('content')
<div class="box" style="padding: 10px;">
  <h4>
    Voluntarios Cadastrados
    <a style="float: right; margin-left: 10px;" class="btn btn-primary" role="button" onclick="print()">Imprimir</a>
    @if (Auth::user()->hasRole('admin'))
      <a style="float: right;" class="btn btn-info" role="button" href="/voluntarios/cadastrar">Cadastrar</a>
    @endif
  </h4>
  <br>

  <table class="table table-bordered table-hover dataTable" id="voluntarios-table">
    <thead>
      <tr>
        <th>X</th>
        <th>Foto</th>
        <th>Nome</th>
        <th>Documento</th>
        <th>Rota</th>
        <th>Turno</th>
        <th>Reside em</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>X</th>
        <th>Foto</th>
        <th>Nome</th>
        <th>Documento</th>
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
    window.location="/voluntarios/pdf/";
  }else{
    window.location="/voluntarios/pdf2/"+ args;
  }
}

$(function () {

  $('#voluntarios-table').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "{{action('VoluntariosController@load') }}",
    columns: [
      {
        "render": function (data, type, JsonResultRow, meta) {
          return ' <input type="checkbox" name="'+JsonResultRow.id+'" value="'+JsonResultRow.id+'"><br>';
        }
      },
      {
        "render": function (data, type, JsonResultRow, meta) {
          return '<image img src="/img/fotos/voluntarios/'+JsonResultRow.foto+'" alt="foto" height="60px" width="60px"></image>';
        }
      },
      { data: 'nome', name: 'nome' },
      { data: 'doc', name: 'doc' },
      { data: 'rota', name: 'rota' },
      { data: 'turno', name: 'turno' },
      { data: 'residencia', name: 'residencia' },
      {
        "render": function (data, type, JsonResultRow, meta) {
          return '@if (Auth::user()->hasRole("admin")) <a class="btn btn-default" role="button" href="/voluntarios/editar/'+JsonResultRow.id+'"><i class="fa fa-edit"></i></a><a class="btn btn-danger" role="button" href="/voluntarios/delete/'+JsonResultRow.id+'"><i class="fa fa-times"></i></a> @endif';
        }
      }
    ]
  });
});
</script>
@stop
