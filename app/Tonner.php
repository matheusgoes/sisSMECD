<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tonner extends Model
{
  protected $fillable = [
      'modelo', 'escola', 'quantidade'
  ];
}
