<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{
	facturas,
	impuesto_valor_agregado,
	precios,
	descuentos
};
class FacturasController extends Controller
{

	public function lista(){
		try {
			$consulta = facturas::where('estado','1')->orderBy('id','desc')->get();
			return $consulta;
		} catch (\Exception $e) {
			return $e;
		}
	}
	
	public function crear(Request $request) {
		try {
			$nuevo_registro = new facturas();
			$nuevo_registro->id_cliente = $request->cliente['id'];
			$nuevo_registro->id_descuento = $request->descuento;
			$nuevo_registro->placa = $request->placa;
			$nuevo_registro->tipo_vehiculo = $request->tipo_vehiculo;
			//consulta para el iva
			$consulta_iva = impuesto_valor_agregado::orderBy('id','desc')->first();
			$nuevo_registro->id_iva = $consulta_iva->id;
			//consulta precios
			$consulta_precio = precios::orderBy('id','desc')->first();
			$nuevo_registro->id_precio = $consulta_precio->id;
			$nuevo_registro->created_by = $request->usuario_logeado;
			$nuevo_registro->save();
			return 'precio creado exitosamente';
		} catch (Exception $e) {
			return $e;
		}
	}

	public function lista_detallada($id){
		try {
			$consulta = facturas::where('id', $id)->with('descuento', 'iva')->get();
			return $consulta;
		} catch (Exception $e) {
			return $e;
		}
	}
}
