<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class inpuesto_valor_agregado extends Model
{
      use SoftDeletes;
      protected $table = "inpuesto_valor_agregado";
}
