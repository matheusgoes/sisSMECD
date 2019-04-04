@extends('adminlte::page')

@section('title', 'Tonners')

@section('content_header')
@stop

@section('content')
<div class="box" style="padding: 10px;">
  <h4>
      Ordens de serviço
      <!-- <a style="float: right; margin-left: 10px;" class="btn btn-primary" role="button" onclick="submit()">Imprimir</a> -->
      @if (Auth::user()->hasRole('admin'))
        <a style="float: right;" class="btn btn-primary" role="button" href="/ordens/cadastrar">Cadastrar</a>
      @endif
  </h4>
  <br>
   <table class="table table-bordered table-hover dataTable" id="ordens-table">
   <thead>
       <tr>
           <th>X</th>
           <th>Id</th>
           <th>Status</th>
           <th>Enviados</th>
           <th>Qtd</th>
           <th>Recebidos</th>
           <th>Qtd</th>
           <th>Entregues</th>
           <th>Qtd</th>
           <th>Data Envio</th>
           <th>Data Recebimento</th>
           <th>Obs </th>
           <th>Ação</th>
       </tr>
   </thead>
   <tfoot>
       <tr>
           <th>X</th>
           <th>Id</th>
           <th>Status</th>
           <th>Enviados</th>
           <th>Qtd</th>
           <th>Recebidos</th>
           <th>Qtd</th>
           <th>Entregues</th>
           <th>Qtd</th>
           <th>Data Envio</th>
           <th>Data Recebimento</th>
           <th>Obs </th>
           <th>Ação</th>
       </tr>
   </tfoot>
   </table>
</div>


<div class="box" style="padding: 10px;">
  <h4>
      Tonners
      <!-- <a style="float: right; margin-left: 10px;" class="btn btn-primary" role="button" onclick="submit()">Imprimir</a> -->
      @if (Auth::user()->hasRole('admin'))
      <a style="float: right;" class="btn btn-primary" role="button" href="/tonners/cadastrar">Cadastrar</a>
      @endif
  </h4>
  <br>
   <table class="table table-bordered table-hover dataTable" id="tonners-table">
   <thead>
       <tr>
           <th>X</th>
           <th>Id</th>
           <th>Modelo</th>
           <th>Escola</th>
           <th>Qtd</th>
           <th>Ação</th>
       </tr>
   </thead>
   <tfoot>
       <tr>
         <th>X</th>
         <th>Id</th>
         <th>Modelo</th>
         <th>Escola</th>
         <th>Qtd</th>
         <th>Ação</th>
       </tr>
   </tfoot>
   </table>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

</script>
  <script type="text/javascript">
    $(function () {

      $('#ordens-table').DataTable({
        "processing": true,
          "serverSide": true,
          "ajax": {
            url: '/ordens/load',
            type: 'GET'
          },
          columns: [
          {
               "render": function (data, type, JsonResultRow, meta) {
                  return ' <input type="checkbox" name="'+JsonResultRow.id+'" value="'+JsonResultRow.id+'"><br>';
              }
          },
          { data: 'id', name: 'id' },
          { data: 'status', name: 'status' },
          { data: 'tonners_enviados', name: 'tonners_enviados' },
          { data: 'qtd_enviado', name: 'qtd_enviado' },
          { data: 'tonners_recebidos', name: 'tonners_recebidos' },
          { data: 'qtd_recebido', name: 'qtd_recebido' },
          { data: 'tonners_entregues', name: 'tonners_entregues' },
          { data: 'qtd_entregue', name: 'qtd_entregue' },
          { data: 'data_envio', name: 'data_envio' },
          { data: 'data_entrega', name: 'data_entrega' },
          { data: 'obs', name: 'obs' },
          {
            "render": function (data, type, JsonResultRow, meta) {
              return '@if (Auth::user()->hasRole("admin")) <a class="btn btn-default" role="button" href="/ordens/editar/'+JsonResultRow.id+'"><i class="fa fa-edit"></i></a> <a class="btn btn-danger" role="button" href="/ordens/delete/'+JsonResultRow.id+'"><i class="fa fa-times"></i></a> @endif';
            }
          }
      ]
      });

      $('#tonners-table').DataTable({
        "processing": true,
          "serverSide": true,
          "ajax": "/tonners/load",
          columns: [
          {
               "render": function (data, type, JsonResultRow, meta) {
                  return ' <input type="checkbox" name="'+JsonResultRow.id+'" value="'+JsonResultRow.id+'"><br>';
              }
          },
          { data: 'id', name: 'id' },
          { data: 'modelo', name: 'modelo' },
          { data: 'escola', name: 'escola' },
          { data: 'quantidade', name: 'quantidade' },
          {
            "render": function (data, type, JsonResultRow, meta) {
              return ' @if (Auth::user()->hasRole("admin")) <a class="btn btn-default" role="button" href="/tonners/editar/'+JsonResultRow.id+'"><i class="fa fa-edit"></i></a> <a class="btn btn-danger" role="button" href="/ordens/delete/'+JsonResultRow.id+'"><i class="fa fa-times"></i></a> @endif';
            }
          }
      ]
      });

    });
  </script>

@stop
