@extends('adminlte::page')

@section('title', 'Editar Tonner')

@section('content_header')
   <h1>Editar Tonner</h1>
@stop

@section('content')
 <div class="box" style="padding: 10px;">
   <h4>Por favor preencha o formulário abaixo:</h4>
   <div id="erro"></div>
   <form name="submit_form" class="form" action="{{ URL::to('/tonners/editar') }}/{{ $tonner->id }}" onsubmit="return validateForm()"  method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
       <table>
         <tr>
           <td> <br> </td>
         </tr>
         <tr>
           <td><label for="modelo">Modelo * </label></td>
           <td><input class="form-control-plaintext col-xs-12"  type="text" name="modelo" placeholder="Modelo (Obrigatório)" value="{{ $tonner->modelo}}"></td>
         </tr>
         <tr>
           <td> <br> </td>
         </tr>
         <tr>
             <td><label for="escola">Escola * </label></td>
             <td><input class="form-control-plaintext col-xs-12"  type="text" name="escola" placeholder="Escola (Obrigatório)" value="{{ $tonner->escola}}"></td>
         </tr>
         <tr>
           <td> <br> </td>
         </tr>
         <tr>
             <td><label for="quantidade">Quantidade * </label></td>
             <td><input  class="form-control-plaintext col-xs-6" type="text" name=quantidade placeholder="Quantidade (Obrigatório)" value="{{ $tonner->quantidade}}"></td>
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

 <script>
   function validateForm() {
       var modelo = document.forms["submit_form"]["modelo"].value;
       var quantidade = document.forms["submit_form"]["quantidade"].value;
       var escola = document.forms["submit_form"]["escola"].value;
       if (modelo == "" || quantidade =="" || escola == "" ) {
           alert("Os campos modelo, escola e quantidade são de preenchimento OBRIGATÓRIO !!!");
           document.getElementById('erro').innerHTML =   '<p style="background-color: lightgrey: ; border-left: 6px solid red; padding:2px;">Preencha os campos obrigatórios. Os campos obrigatórios possuem um * ao lado do nome.</p>';
           return false;
       }
   }
 </script>
 @stop
