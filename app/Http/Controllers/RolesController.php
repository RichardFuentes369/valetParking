<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\roles;

class RolesController extends Controller
{
    public function lista(){
      try {
          $consulta = roles::with('tengoUsuarios')->get();
          return $consulta;
      } catch (\Exception $e) {
          return $e;
      }
    }

    public function crear(Request $request){
      try {
        $nuevo_registro = new roles();
        $nuevo_registro->nombre = $request->nombre;
        $nuevo_registro->descripcion = $request->descripcion;
        $nuevo_registro->save();
        return 'rol creado  con exito';
      } catch (\Exception $e) {
        return $e;
      }
    }

    public function actualizar($id, Request $request){
      try {
        $actualizar_registro = roles::find($id);
        $actualizar_registro->nombre = $request->nombre;
        $actualizar_registro->descripcion = $request->descripcion;
        $actualizar_registro->save();
        return 'rol actualizado  con exito';
      } catch (\Exception $e) {
        return $e;
      }
    }

    public function eliminar($id){
      try {
        $eliminar_registro = roles::find($id);
        $eliminar_registro->delete();
      } catch (\Exception $e) {
          return $e;
      }
    }
}
