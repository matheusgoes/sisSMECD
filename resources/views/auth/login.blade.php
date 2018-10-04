@extends('adminlte::login')
<style media="screen">
  .bg{
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
    height: 85%;
  }
  .login-box{
    background: gray;
  }
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    $('body').css('background-image',  'url(/img/onibus.jpg)');
    $('body').removeClass('login-page').addClass('bg');
  });
</script>
