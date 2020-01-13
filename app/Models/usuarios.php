<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuarios extends Model
{
    use SoftDeletes;
    protected $table = "usuarios";

    public function rol(){
      return $this->belongsTo('App\Models\roles', 'id_rol');
    }

}
