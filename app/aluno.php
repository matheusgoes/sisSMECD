<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{
  protected $fillable = [
      'nome', 'doc', 'data_nasc','escola','serie', 'turno' , 'rota', 'residencia', 'foto', 'pai', 'mae'
  ];
}
