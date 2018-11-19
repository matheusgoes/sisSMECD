@extends('adminlte::page')

@section('title', 'Início')

@section('content_header')
    <h1>Início</h1>
@stop

@section('content')

    <p>Bem Vindo, <?= $nome; ?> !</p>
    <div class="box" style="padding: 10px;">
      <h4>
          Alunos Cadastrados
          <a style="float: right; margin-left: 10px;" class="btn btn-info" role="button" href="{{action('AlunoController@generatePDF')}}">Imprimir</a>
          <a style="float: right;" class="btn btn-danger" role="button" href="/alunos/cadastrar">Cadastrar</a>
    </h4>
    <br>
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

    <hr>

    <div class="box" style="padding: 10px;">
      <h4>
          Acompanhantes Cadastrados
          <a style="float: right; margin-left: 10px;" class="btn btn-info" role="button" href="{{action('AcompanhanteController@generatePDF')}}">Imprimir</a>
          <a style="float: right;" class="btn btn-danger" role="button" href="/acompanhantes/cadastrar">Cadastrar</a>
      </h4>
      <br>
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
      <!-- <tbody>
          @foreach ($acompanhantes as $acompanhante)
              <tr>
                  <td> <img src="{{$acompanhante->foto}}" alt=""  style="heigth: 100px; width:100px;"> </td>
                  <td> {{$acompanhante->nome}} </td>
                  <td>{{$acompanhante->doc}}</td>
                  <td>{{$acompanhante->aluno}}</td>
                  <td>{{$acompanhante->rota}}</td>
              </tr>
          @endforeach
      </tbody> -->
      <tfoot>
          <tr>
              <th>Foto</th>
              <th>Nome</th>
              <th>Documento</th>
              <th>Aluno</th>
              <th>Rota</th>
              <th>Turno</th>
              <th>Reside em</th>
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

        $('#acompanhantes-table').DataTable({
          "processing": true,
            "serverSide": true,
            "ajax": "/acompanhantes/load",
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
