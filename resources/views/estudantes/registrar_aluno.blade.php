@extends('adminlte::page')

@section('title', 'Cadastrar Aluno')

@section('content_header')
    <h1>Cadastrar Aluno</h1>
@stop

@section('content')
  <div class="box" style="padding: 10px;">
    <h4>Por favor preencha o formulário abaixo:</h4>

    <form class="form" action="{{ URL::to('/alunos/cadastrar') }}" method="post" enctype="multipart/form-data">
        <label for="nome">Nome</label>
        <input  type="text" name="nome" placeholder="nome"><br>

        <label for="serie">Série</label>
        <input  type="text" name="serie" placeholder="serie"><br>

        <label for="escola">Escola</label>
        <input  type="text" name=escola placeholder="escola"><br>

        <label for="turno" >Turno</label>
        <input  type="text" name=turno placeholder="Turno"><br>

        <label for="documento">Documento</label>
        <input  type="text" name=documento placeholder="documento"><br>

        <label for="residencia">Reside em</label>
        <input  type="text" name=residencia placeholder="Reside em"><br>

        <label for="rota">Rota</label>
        <input  type="text" name=rota placeholder="rota"><br>

        <label for="data_nasc">Data de Nascimento</label>
        <input  type="text" name=data_nasc placeholder="Data de Nascimnento"><br><br>

        <label for="mae">Mãe</label>
        <input  type="text" name=mae placeholder="Mãe"><br>

        <label for="pai">Pai</label>
        <input  type="text" name=pai placeholder="Pai"><br>

        <label for="photo">Foto</label>
        <input type="file" name="photo" id="photo">

        {{ csrf_field() }}

        <br>

        <input type="submit" value="Registrar!">
    </form>
  </div>
  @stop
