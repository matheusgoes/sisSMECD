@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
@stop

@section('content')

  <div class="box" style="padding: 10px;">
    <h4>
        Alunos Cadastrados
        <a style="float: right;" class="btn btn-info" role="button" href="{{action('AlunoController@generatePDF')}}">Imprimir</a>
    </h4>
    <table class="table table-bordered table-hover dataTable" id="alunos-table">
    <thead>
        <tr>
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
        </tr>
    </thead>
    <tfoot>
        <tr>
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
        </tr>
    </tfoot>
    </table>

  </div>



  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </script>
      <script type="text/javascript">
        $(function () {

          $('#alunos-table').DataTable({
                "processing": true,
                  "serverSide": true,
                  "ajax": "{{action('AlunoController@load') }}",
                  columns: [
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
                  { data: 'rota', name: 'rota' }
              ]
              });

        });
      </script>
@stop
