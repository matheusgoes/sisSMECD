@extends('adminlte::page')

@section('title', 'Editar Ordem de Serviço')

@section('content_header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<h1>Editar Ordem de Serviço</h1>
@stop

@section('content')
<div class="box" style="padding: 10px;">
   <h4>Por favor preencha o formulário abaixo:</h4>
   <div id="erro"></div>
   <form name="submit_form" class="form" action="{{ URL::to('/ordens/editar') }}/{{ $ordem->id }}" onsubmit="return validateForm()"  method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table>
         <tr>
            <td><label for="status">Status* </label></td>
            <td>
               <select id="status" name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                     <option selected="selected">Enviado</option>
                     <option>Recebido</option>
                     <option>Em entrega</option>
                     <option>Concluído</option>
               </select>
            </td>
         </tr>
         <tr>
            <td> <br> </td>
         </tr>
         <tr>
            <td><label for="enviados">Modelos enviados * </label></td>
            <td>
               <div class="form-group">
                  <select name="enviados[]" id="enviados" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecionar tonners" style="width: 100%;" tabindex="-1" aria-hidden="true">
                     @foreach($tonners as $tonner)
                     <option value="{{$tonner->id }}"}}>
                        {{ $tonner->escola }} – {{ $tonner->modelo }}
                     </option>
                     @endforeach
                  </select>
               </div>
            </td>
         </tr>

         <tr>
            <td>
               <label for="enviados">Tonners Recebidos </label>
            </td>
            <td>
               <div class="form-group">
                  <select name="recebidos[]" id="recebidos" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecionar tonners" style="width: 100%;" tabindex="-1" aria-hidden="true">
                     @foreach($enviados as $tonner)
                     <option value="{{$tonner->id }}"}}>
                        {{ $tonner->escola }} – {{ $tonner->modelo }}
                     </option>
                     @endforeach
                  </select>
               </div>
            </td>

         </tr>
         <tr>
            <td>
               <label for="enviados">Tonners Entregues </label>
            </td>
            <td>
               <div class="form-group">
                  <select name="entregues[]" id="entregues" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecionar tonners" style="width: 100%;" tabindex="-1" aria-hidden="true">
                     @foreach($enviados as $tonner)
                     <option value="{{$tonner->id }}"}}>
                        {{ $tonner->escola }} – {{ $tonner->modelo }}
                     </option>
                     @endforeach
                  </select>
               </div>
            </td>
         </tr>

         <tr>
            <td><label for="data_envio">Data de Envio *</label></td>
            <td><div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name=data_envio placeholder="Data de Envio (Obrigatório)" type="text" class="form-control pull-right" class="datepicker" id="datepicker" value="{{ $ordem->data_envio }}">
                    </div>
            </td>         </tr>
         <tr>
            <td> <br> </td>
         </tr>
         <tr>
            <td><label for="data_entrega">Data de recebimento *</label></td>
            <td><div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name=data_entrega placeholder="Data de entrega (Obrigatório)" type="text" class="form-control pull-right" class="datepicker" id="datepicker" value="{{ $ordem->data_entrega }}">
                    </div>
            </td>         </tr>
         <tr>
            <td> <br> </td>
         </tr>
         <tr>
            <td><label for="quantidade">Quantidade de tonners *</label></td>
            <td><input  class="form-control-plaintext col-xs-3" type="text" name=quantidade placeholder="Quantidade de tonners (Obrigatório)" value="{{ $ordem->quantidade }}"></td>
         </tr>
         <tr>
         <td> <br> </td>
         </tr>
         <tr>
            <td></td>
            <td> <center> <input class="btn btn-primary mb-2" type="submit" value="Registrar!"> </center></td>
         </tr>
      </table>
   </form>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script>
$(document).ready(function(){
   var select_enviados = $('#enviados').select2();
   var select_recebidos = $('#recebidos').select2();
   var select_entregues = $('#entregues').select2();
   var select_status = $('#status').select2();
   var itens = new Array();

   select_status.val("{{ $ordem->status }}").trigger("change");

   @foreach($ordem->tonners_enviados as $itens_enviados)
   itens_enviados.push("{{ $itens_enviados }}");
   @endforeach
   select_enviados.val(itens_enviados).trigger("change");

});

function validateForm() {
   var enviados = document.forms["submit_form"]["enviados[]"].value;
   var data_envio = document.forms["submit_form"]["data-envio"].value;
   var quantidade = document.forms["submit_form"]["quantidade"].value;
   // $('#enviados option:selected').each(function() {
   //     alert($(this).val());
   // });
   console.log(enviados.length);
   if (enviados == "" || data_envio == "" || quantidade == "") {
      alert("Os campos Modelos Enviados, Quantidade e Data de envio são de preenchimento OBRIGATÓRIO !!!");
      document.getElementById('erro').innerHTML =   '<p style="background-color: lightgrey: ; border-left: 6px solid red; padding:2px;">Preencha os campos obrigatórios. Os campos obrigatórios possuem um * ao lado do nome.</p>';
      return false;
   }
}
</script>
@stop
