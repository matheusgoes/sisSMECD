<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordem_servico extends Model
{
  protected $fillable = [
     'status', 'quantidade', 'tonners_enviados', 'tonners_recebidos', 'tonners_entregues', 'data_envio', 'data_entrega'
  ];
}
