<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clientes;
use Carbon\Carbon;

class ClientesController extends Controller
{

	public function lista(){
		try {
			$consulta = clientes::get();
			return $consulta;
		} catch (\Exception $e) {
			return $e;
		}
	}

	public function crear(Request $request){
		try {
			$fecha_na = Carbon::parse($request->fecha_nacimiento);
			$nuevo_registro = new clientes();
			$nuevo_registro->asociado = $request->asociado;
			$nuevo_registro->nombre = $request->nombre;
			$nuevo_registro->apellido = $request->apellido;
			$nuevo_registro->td = $request->td;
			$nuevo_registro->dni = $request->dni;
			$nuevo_registro->fecha_nacimiento = $fecha_na;
			$nuevo_registro->fijo = $request->fijo;
			$nuevo_registro->celular = $request->celular;
			$nuevo_registro->created_by = $request->usuario_logeado;
			$nuevo_registro->save();
			return 'precio creado exitosamente';
		} catch (\Exception $e) {
			return $e;
		}
	}
}
