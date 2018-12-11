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
               <table class="table table-bordered table-hover dataTable" id="tonners-enviados">
               <thead>
                   <tr>
                       <th>Modelo</th>
                       <th>Escola</th>
                       <th>Quantidade</th>
                   </tr>
               </thead>
               <tbody>
                  @for ($i = 0; $i < sizeOf($tonners); $i++)
                   <tr>
                      <td>{{ $tonners[$i]->modelo }}</td>
                      <td>{{ $tonners[$i]->escola }}</td>
                      <td><input type="hidden" name=ids_enviados[] value="{{ $tonners[$i]->id }}">
                        @php ($qtd = 0) @endphp
                        @for ($j = 0; $j < sizeOf($ids_enviados); $j++)
                           @if ($tonners[$i]->id == $ids_enviados[$j])
                              @php ($qtd = $qtd_enviado[$j] ) @endphp
                           @endif
                        @endfor

                        @if ( $qtd != 0 )
                           <input  class="form-control-plaintext col-xs-12" type="text" name="qtd_enviados[]" placeholder="Quantidade de tonners (Obrigatório)" value="{{ $qtd }} ">
                        @else
                           <input  class="form-control-plaintext col-xs-12" type="text" name="qtd_enviados[]" placeholder="Quantidade de tonners (Obrigatório)">
                        @endif
                      </td>
                   </tr>
                 @endfor
               </tbody>
               </table>
             </div>
           </td>
         </tr>

         <tr>
           <td><label for="recebidos">Modelos recebidos * </label></td>
           <td>
             <div class="form-group">
               <table class="table table-bordered table-hover dataTable" id="tonners-recebidos">
               <thead>
                   <tr>
                       <th>Modelo</th>
                       <th>Escola</th>
                       <th>Quantidade</th>
                   </tr>
                </thead>
                <tbody>
                   @for ($i = 0; $i < sizeOf($enviados); $i++)
                    <tr>
                       <td>{{ $enviados[$i]->modelo }}</td>
                       <td>{{ $enviados[$i]->escola }}</td>


                       <td><input type="hidden" name=ids_recebidos[] value="{{ $enviados[$i]->id }}">
                       @php ($qtd = 0) @endphp
                       @for ($j = 0; $j < sizeOf($ids_recebidos); $j++)
                          @if ($enviados[$i]->id == $ids_recebidos[$j])
                             @php ($qtd = $qtd_recebido[$j] ) @endphp
                          @endif
                       @endfor

                       @if ( $qtd != 0 )
                           <input  class="form-control-plaintext col-xs-12" type="text" name="qtd_recebidos[]" placeholder="Quantidade de tonners (Obrigatório)" value="{{ $qtd }}">
                       @else
                           <input  class="form-control-plaintext col-xs-12" type="text" name="qtd_recebidos[]" placeholder="Quantidade de tonners (Obrigatório)">
                       @endif

                       </td>
                    </tr>
                   @endfor
                </tbody>
               </table>
             </div>
           </td>
        </tr>
        <hr>
         <tr>
           <td><label for="entregues">Modelos entregues * </label></td>
           <td>
             <div class="form-group">
               <table class="table table-bordered table-hover dataTable" id="tonners-entregues">
               <thead>
                   <tr>
                       <th>Modelo</th>
                       <th>Escola</th>
                       <th>Quantidade</th>
                   </tr>
                </thead>
                <tbody>
                   @for ($i = 0; $i < sizeOf($recebidos); $i++)
                    <tr>
                       <td>{{ $recebidos[$i]->modelo }}</td>
                       <td>{{ $recebidos[$i]->escola }}</td>
                       <td><input type="hidden" name=ids_entregues[] value="{{ $recebidos[$i]->id }}">
                         @php ($qtd = 0) @endphp
                         @for ($j = 0; $j < sizeOf($ids_entregues); $j++)
                            @if ($recebidos[$i]->id == $ids_entregues[$j])
                               @php ($qtd = $qtd_entregue[$j] ) @endphp
                            @endif
                         @endfor

                        @if ( $qtd != 0 )
                           <input  class="form-control-plaintext col-xs-12" type="text" name="qtd_entregues[]" placeholder="Quantidade de tonners (Obrigatório)" value="{{ $qtd }}">
                       @else
                           <input  class="form-control-plaintext col-xs-12" type="text" name="qtd_entregues[]" placeholder="Quantidade de tonners (Obrigatório)">
                       @endif
                       </td>
                    </tr>
                   @endfor
                </tbody>
               </table>
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
            <td><label for="obs">Observações *</label></td>
            <td><input  class="form-control-plaintext col-xs-12" type="text" name=obs placeholder="Quantidade de tonners (Obrigatório)" value="{{ $ordem->obs }}"></td>
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
   function validateForm() {
     var enviados = document.forms["submit_form"]["id"].value;
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
