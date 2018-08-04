
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
    background: lightyellow;
    height: 40px;
    text-align: center;
    padding: 3px 0px 0px 0px;
    font-size: 10pt;
    display: block;
}

.footer{
    padding: 10px 0px 0px 0px;
    text-align: center;
    background: lightyellow;
    height: 25px;
    vertical-align : bottom;
    display: block;
}

h1, h2, h3, h4, h5, h6, p{
    margin: 0px;
    vertical-align: middle;
}

</style>
@foreach ($acompanhantes as $acompanhante)

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
                    <table style="padding-left: 10px;">
                        <tr>
                            <td><b>Acompanha: </b> {{$acompanhante->aluno}}</td>
                        </tr>
                        <tr>
                            <td><b>Nº do Documento</b>: {{$acompanhante->doc}}</td>
                        </tr>
                    </table>

                </div>

                <div class="footer">
                    <h4>TRANSPORTE ESCOLAR – ACOMPANHANTE</h4>
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
                                <div style="width: 70px; height: 80px; border-style: solid; border-width: 1px;">
                                    <img  src="{{ public_path('img/fotos/acompanhantes/') }}{{$acompanhante->foto}}" alt="foto" height="80" width="70">
                                </div>
                            </td>
                            <td width="100%">
                                <table style="margin-top: 0px;">
                                    <tr style="margin-top: 0px;">
                                        <td style="width: 100%">
                                            <b>Nome: </b> {{$acompanhante->nome}}
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 5px;">
                                        <td style="width: 100%"><b>Acopanha: </b>{{$acompanhante->aluno}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table width="100%;">
                            <tr>
                                <td style="width: 30%; text-align: center;"> <h4> <b>Rota:</b> {{$acompanhante->rota}}</h4></td>
                                <td style="width: 30%; text-align: center;"><b>Turno:</b> {{$acompanhante->turno}}</td>
                            </tr>
                    </table>
                </div>
                <div class="footer">
                    <h3>{{$acompanhante->residencia}}</h3>
                </div>
            </div>
        </div>

<br>
@endforeach

@endsection
