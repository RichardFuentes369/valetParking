<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class facturas extends Model
{
	use SoftDeletes;
	protected $table = "facturas";


	public function descuento()	{
		return $this->belongsTo('App\Models\descuentos', 'id_descuento');
	}

	public function iva()	{
		return $this->belongsTo('App\Models\impuesto_valor_agregado', 'id_iva');
	}	

	public function cliente()	{
		return $this->belongsTo('App\Models\clientes', 'id_cliente');
	}
}
