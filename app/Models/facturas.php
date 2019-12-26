<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class facturas extends Model
{
      use SoftDeletes;
      protected $table = "facturas";
}
