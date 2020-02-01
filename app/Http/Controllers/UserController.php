<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
  DB,
  Hash
};
use Carbon\Carbon;
use App\Models\usuarios;

class UserController extends Controller
{
  public function lista(){
    try {
      $consulta = usuarios::with('rol')->get();
      return $consulta;
    } catch (\Exception $e) {
        return $e;
    }
  }

  public function crear(Request $request){
    try {
      $fecha_na = Carbon::parse($request->fecha_nacimiento);
      $fecha_in = Carbon::parse($request->inicio_contrato);
      $fecha_fi = Carbon::parse($request->fin_contrato);
      $nuevo_registro = new usuarios();
      $nuevo_registro->nombre = $request->nombre;
      $nuevo_registro->apellido = $request->apellido;
      $nuevo_registro->td = $request->td;
      $nuevo_registro->dni = $request->dni;
      $nuevo_registro->email = $request->email;
      $nuevo_registro->password = bcrypt($request->dni);
      $nuevo_registro->fecha_nacimiento = $fecha_na->year.'/'.$fecha_na->month.'/'.$fecha_na->day;
      $nuevo_registro->telefono_fijo = $request->telefono_fijo;
      $nuevo_registro->telefono_celular = $request->telefono_celular;
      $nuevo_registro->inicio_contrato = $fecha_in->year.'/'.$fecha_in->month.'/'.$fecha_in->day;
      $nuevo_registro->fin_contrato = $fecha_fi->year.'/'.$fecha_fi->month.'/'.$fecha_fi->day;
      $nuevo_registro->id_rol = $request->id_rol;
      $nuevo_registro->save();
      return 'usuario creado';
    } catch (\Exception $e) {
        return $e;
    }
  }

  public function eliminar($id){
    try {
      $eliminar_registro = usuarios::find($id);
      $eliminar_registro->delete();
    } catch (\Exception $e) {
        return $e;
    }
  }
}
