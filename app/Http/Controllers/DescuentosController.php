<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\descuentos;

class DescuentosController extends Controller
{
    public function lista(){
      try {
        $consulta = descuentos::get();
        return $consulta;
      } catch (\Exception $e) {
        return $e;
      }
    }

    public function crear(Request $request){
      try {
        $nuevo_registro = new descuentos();
        $nuevo_registro->nombre = $request->nombre;
        $nuevo_registro->descripcion = $request->descripcion;
        $nuevo_registro->porcentaje = $request->porcentaje;
        $nuevo_registro->save();
        return 'precio creado exitosamente';
      } catch (\Exception $e) {
          return $e;
      }
    }

    public function actualizar($id, Request $request){
      try {
        $actualizar_registro = descuentos::find($id);
        $actualizar_registro->nombre = $request->nombre;
        $actualizar_registro->descripcion = $request->descripcion;
        $actualizar_registro->porcentaje = $request->porcentaje;
        $actualizar_registro->save();
        return 'descuento actualizado  con exito';
      } catch (\Exception $e) {
        return $e;
      }
    }

    public function eliminar($id){
      try {
        $eliminar_registro = descuentos::find($id);
        $eliminar_registro->delete();
      } catch (\Exception $e) {
          return $e;
      }
    }
}
