<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class acompanhante extends Model
{
  protected $fillable = [
      'nome', 'doc', 'aluno','rota', 'foto', 'residencia', 'turno'
  ];
}
