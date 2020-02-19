<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class roles extends Model
{
	use SoftDeletes;
	protected $table = "roles";

	public function tengoUsuarios(){
		return $this->hasMany('App\Models\usuarios', 'id_rol');
	}

}
