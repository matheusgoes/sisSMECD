
@extends('pdf.master')
@section('content')

<style>
    body{
        font-size: 11pt;
        font-family: sans-serif;
    }
    .carteira {
        width: 100%;
        height: 215px;
        position:relative
    }

    .right, .left{
        border-style: solid;
        border-width: 1%;
        width: 49%;
        height: 210px;
        padding-left: 1px;
        padding-right: 1px;
        position:relative
    }

    .body{
        height: 130px;
    }

    .header{
        background: lightblue;
        height: 40px;
        text-align: center;
        padding: 3px 0px 0px 0px;
        font-size: 10pt;
        display: block;
    }

    .footer{
        padding: 10px 0px 0px 0px;
        text-align: center;
        background: lightblue;
        height: 25px;
        vertical-align : bottom;
        display: block;
    }

    h1, h2, h3, h4, h5, h6, p{
        margin: 0px;
        vertical-align: middle;
    }


</style>
@foreach ($alunos as $aluno)


<div class="carteira">
    <div class="left" style="float: left;">
        <div class="header" >
            <div style="margin: 0 auto; text-align: center; display:inline-block;     vertical-align: middle; padding-left: 5px;">
                <img src="{{ public_path('img/brasao.png') }}" height="40" width="40">
            </div>
            <div style="width: 70%; margin: 2 auto; text-align: left; display:inline-block; font-size: 14px; vertical-align: middle;">
                <p > Prefeitura de  </p>
                <h4 >São Paulo do Potengi </h4>
            </div>
        </div>

                <div class="body">
                    <table >
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td><b>Data de Nascimento:</b> {{$aluno->data_nasc}}</td>
                                    </tr>
                                      <tr>
                                          <td><b>Mãe: </b>{{$aluno->mae}}</td>
                                      </tr>
                                      <tr>
                                          <td><b>Pai: </b>{{$aluno->pai}}</td>
                                      </tr>
                                      <tr>
                                          <td><b>Nº do Documento</b>: {{$aluno->doc}}</td>
                                      </tr>
                                </table>

                            </td>

                            <td style="vertical-align: top; text-align: right; width: 10px;">

                            </td>
                        </tr>

                    </table>

                </div>

                <div class="footer">

                    <h4>TRANSPORTE ESCOLAR – ALUNO (A)</h4>
                </div>
            </div>

            <div class="right" style="float: right;">
                <div class="header" width="100%" >
                    <table>
                        <tr width="100%" style="margin: 0px; vertical-align: middle;">
                            <td width="80%">
                                <h4 style="padding: 0px 10px 5px 10px;">
                                Secretaria Municipal Educação, <br> Cultura e Desporto </h4>
                            </td>
                            <td width="20%" style="text-align: right; padding-left: 40px; padding-top: -5px;">
                                <p>Válido até</p>
                                <h4>DEZ/2018</h4>
                            </td>
                        </tr>
                    </table>

                </div>


                <div class="body">
                    <table>
                        <tr>
                            <td>
                                <div style="width: 70px; height: 80px;">
                                    <img  src="{{ public_path('img/fotos/alunos/') }}{{$aluno->foto}}" alt="profile Pic" height="80" width="70">
                                </div>
                            </td>
                            <td width="100%">
                                <table style="margin-top: 0px;">
                                    <tr style="margin-top: 0px;">
                                        <td style="width: 100%">
                                            <b>Nome: </b> {{$aluno->nome}}
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="width: 100%"><b>Escola: </b>{{$aluno->escola}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table width="100%;" style="margin-top: 10px;">
                            <tr>
                                <td style="width: 33%; padding-left:7px;"> <h4> <b>Rota:</b> {{$aluno->rota}}</h4></td>
                                <td style="width: 40%; padding-left:10px;"><b>Turno:</b> {{$aluno->turno}}</td>
                                <td style="width: 27%;"><b>Série:</b> {{$aluno->serie}}</td>
                            </tr>
                    </table>
                </div>
                <div class="footer">
                    <h3> {{$aluno->residencia}}</h3>
                </div>
            </div>
        </div>

<br>
@endforeach

@endsection
