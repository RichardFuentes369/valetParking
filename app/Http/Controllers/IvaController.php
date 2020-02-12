<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\impuesto_valor_agregado;

class IvaController extends Controller
{

  public function lista(){
    try {
      $consulta = impuesto_valor_agregado::get();
      return $consulta;
    } catch (\Exception $e) {
      return $e;
    }
  }

  public function crear(Request $request){
    try {
      $nuevo_registro = new impuesto_valor_agregado();
      $nuevo_registro->anho = $request->anho;
      $nuevo_registro->porcentaje = $request->porcentaje;
      $nuevo_registro->descripcion = $request->descripcion;
      $nuevo_registro->created_by = $request->usuario_logeado;
      $nuevo_registro->save();
      return 'iva creado exitosamente';
    } catch (\Exception $e) {
      return $e;
    }
  }

  public function actualizar($id, Request $request){
    try {
      $actualizar_registro = impuesto_valor_agregado::find($id);
      $actualizar_registro->porcentaje = $request->porcentaje;
      $actualizar_registro->save();
      return 'iva actualizado  con exito';
    } catch (\Exception $e) {
      return $e;
    }
  }

  public function eliminar($id){
    try {
      $eliminar_registro = impuesto_valor_agregado::find($id);
      $eliminar_registro->delete();
    } catch (\Exception $e) {
      return $e;
    }
  }
}
