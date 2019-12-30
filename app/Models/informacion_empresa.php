<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class informacion_empresa extends Model
{
  use SoftDeletes;
  protected $table = "informacion_empresa";
}
