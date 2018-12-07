<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordem_servico extends Model
{
  protected $fillable = [
     'status', 'qtd', 'tonners_enviados', 'tonners_recebidos', 'tonners_entregues', 'data_envio', 'data_entrega', 'obs'
  ];
}
