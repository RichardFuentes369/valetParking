<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
	DB,
	Auth
};
use App\Models\{
	facturas,
	impuesto_valor_agregado,
	precios,
	descuentos
};
class FacturasController extends Controller
{

	public function listaCobradas(){
		try {
			$consulta = facturas::where('estado','0')->with('cliente')->orderBy('id','desc')->get();
			return $consulta;
		} catch (\Exception $e) {
			return $e;
		}
	}	

	public function listaPorCobrar(){
		try {
			$consulta = facturas::where('estado','1')->with('cliente')->orderBy('id','desc')->get();
			return $consulta;
		} catch (\Exception $e) {
			return $e;
		}
	}
	
	public function crear(Request $request) {
		try {
			// return $request;
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

	public function listaDetallada($id){
		try {
			$consulta = facturas::where('id', $id)->with('cliente', 'descuento', 'iva')->get();
			return $consulta;
		} catch (Exception $e) {
			return $e;
		}
	}

	public function cobrarFactura(Request $request, $id_factura){
		try {
			$actualziar_registro = facturas::where('id', $id_factura)->first();
			$actualziar_registro->total = $request->total;
			$actualziar_registro->estado = '0';
			$actualziar_registro->updated_by = $request->usuario_logeado;
			if($actualziar_registro->corte_mes = '1'){
				$actualziar_registro->corte_mes = '0';
			}
			$actualziar_registro->save();
			return 'cobro exitosamente';
		} catch (Exception $e) {
			return $e;
		}
	}

	public function marcarCorte(){
		try {
			$actualziar_registros = facturas::where('corte_mes','0')->get();
			foreach ($actualziar_registros as $actualziar_registros) {
				$actualziar_registros->corte_mes = '1';
				$actualziar_registros->save();
			}
		} catch (Exception $e) {
			return $e;
		}
	}

	public function listarFacturas(){
		try {
			$consulta = DB::SELECT("SELECT usu.nombre, 
				(SELECT COUNT(fac.id) FROM facturas AS fac WHERE fac.updated_by = usu.email AND fac.corte_mes = '0') AS cobradas, 
				(SELECT ROUND(SUM(fac.total),2) FROM facturas AS fac WHERE fac.updated_by = usu.email AND fac.corte_mes = '0') AS total FROM usuarios AS usu
				WHERE usu.id_rol = 2");
			return $consulta;
		} catch (Exception $e) {
			return $e;
		}
	}
}
