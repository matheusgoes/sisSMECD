@extends('adminlte::page')

@section('title', 'Tonners')

@section('content_header')
@stop

@section('content')
<div class="box" style="padding: 10px;">
  <h4>
      Ordens de serviço
      <!-- <a style="float: right; margin-left: 10px;" class="btn btn-primary" role="button" onclick="submit()">Imprimir</a> -->
      <a style="float: right;" class="btn btn-primary" role="button" href="/ordens/cadastrar">Cadastrar</a>
  </h4>
  <br>
   <table class="table table-bordered table-hover dataTable" id="ordens-table">
   <thead>
       <tr>
           <th>X</th>
           <th>Id</th>
           <th>Status</th>
           <th>Quantidade</th>
           <th>Enviados</th>
           <th>Recebidos</th>
           <th>Entregues</th>
           <th>Data Envio</th>
           <th>Data Recebimento</th>
           <th>Ação</th>
       </tr>
   </thead>
   <tfoot>
       <tr>
           <th>X</th>
           <th>Id</th>
           <th>Status</th>
           <th>Quantidade</th>
           <th>Enviados</th>
           <th>Recebidos</th>
           <th>Entregues</th>
           <th>Data Envio</th>
           <th>Data Recebimento</th>
           <th>Ação</th>
       </tr>
   </tfoot>
   </table>
</div>


<div class="box" style="padding: 10px;">
  <h4>
      Tonners
      <!-- <a style="float: right; margin-left: 10px;" class="btn btn-primary" role="button" onclick="submit()">Imprimir</a> -->
      <a style="float: right;" class="btn btn-primary" role="button" href="/tonners/cadastrar">Cadastrar</a>
  </h4>
  <br>
   <table class="table table-bordered table-hover dataTable" id="tonners-table">
   <thead>
       <tr>
           <th>X</th>
           <th>Id</th>
           <th>Modelo</th>
           <th>Escola</th>
           <th>Quantidade</th>
           <th>Ação</th>
       </tr>
   </thead>
   <tfoot>
       <tr>
         <th>X</th>
         <th>Id</th>
         <th>Modelo</th>
         <th>Escola</th>
         <th>Quantidade</th>
         <th>Ação</th>
       </tr>
   </tfoot>
   </table>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</script>
  <script type="text/javascript">
    $(function () {

      $('#ordens-table').DataTable({
        "processing": true,
          "serverSide": true,
          "ajax": "/ordens/load",
          columns: [
          {
               "render": function (data, type, JsonResultRow, meta) {
                  return ' <input type="checkbox" name="'+JsonResultRow.id+'" value="'+JsonResultRow.id+'"><br>';
              }
          },
          { data: 'id', name: 'id' },
          { data: 'status', name: 'status' },
          { data: 'quantidade', name: 'quantidade' },
          { data: 'tonners_enviados', name: 'tonners_enviados' },
          { data: 'tonners_recebidos', name: 'tonners_recebidos' },
          { data: 'tonners_entregues', name: 'tonners_entregues' },
          { data: 'data_envio', name: 'data_envio' },
          { data: 'data_entrega', name: 'data_entrega' },
          {
            "render": function (data, type, JsonResultRow, meta) {
              return '<a class="btn btn-default" role="button" href="/ordens/editar/'+JsonResultRow.id+'"><i class="fa fa-edit"></i></a> <a class="btn btn-danger" role="button" href="/ordens/delete/'+JsonResultRow.id+'"><i class="fa fa-times"></i></a>';
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
              return '<a class="btn btn-default" role="button" href="/tonners/editar/'+JsonResultRow.id+'"><i class="fa fa-edit"></i></a> <a class="btn btn-danger" role="button" href="/ordens/delete/'+JsonResultRow.id+'"><i class="fa fa-times"></i></a>';
            }
          }
      ]
      });

    });
  </script>

@stop
