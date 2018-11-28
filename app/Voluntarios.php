<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voluntarios extends Model
{
  protected $fillable = [
      'nome', 'doc', 'rota', 'foto', 'residencia', 'turno'
  ];
}
