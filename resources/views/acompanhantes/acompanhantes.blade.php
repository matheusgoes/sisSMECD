@extends('adminlte::page')

@section('title', 'Acompanhantes')

@section('content_header')
@stop

@section('content')
<div class="box" style="padding: 10px;">
  <h1>Acompanhantes Cadastrados
    <a style="float: right;" class="btn btn-info" role="button" href="{{action('AcompanhanteController@generatePDF')}}">Imprimir</a>
  </h1>

  <table class="table table-bordered table-hover dataTable" id="acompanhantes-table">
  <thead>
      <tr>
          <th>Foto</th>
          <th>Nome</th>
          <th>Documento</th>
          <th>Aluno</th>
          <th>Rota</th>
          <th>Turno</th>
          <th>Reside em</th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th>Foto</th>
          <th>Nome</th>
          <th>Documento</th>
          <th>Aluno</th>
          <th>Turno</th>
          <th>Rota</th>
          <th>Reside em</th>
      </tr>
  </tfoot>
  </table>
</div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</script>
    <script type="text/javascript">
      $(function () {

        $('#acompanhantes-table').DataTable({
          "processing": true,
            "serverSide": true,
            "ajax": "{{action('AcompanhanteController@load') }}",
            columns: [
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
            { data: 'residencia', name: 'residencia' }
        ]
        });
      });
    </script>
@stop
