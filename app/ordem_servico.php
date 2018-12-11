<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordem_servico extends Model
{
  protected $fillable = [
     'status', 'qtd_enviado','qtd_recebido', 'qtd_entregue' , 'tonners_enviados', 'tonners_recebidos', 'tonners_entregues', 'data_envio', 'data_entrega', 'obs'
  ];
}
