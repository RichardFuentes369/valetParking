<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\informacion_empresa;

class InformacionEmpresaController extends Controller
{
    public function informacion(){
      try {
          $consulta = informacion_empresa::first();
          return $consulta;
      } catch (\Exception $e) {
          return $e;
      }
    }

    public function actualizar(Request $request){
      try {
        $actualizar_registro = informacion_empresa::first();
        $actualizar_registro->mision = $request->mision;
        $actualizar_registro->vision = $request->vision;
        $actualizar_registro->ubicacion_gps = $request->ubicacion_gps;
        $actualizar_registro->direccion = $request->direccion;
        $actualizar_registro->ciudad = $request->ciudad;
        $actualizar_registro->pais = $request->pais;
        $actualizar_registro->telefono = $request->telefono;
        $actualizar_registro->save();
        return 'informacion de la empresa actualizada';
      } catch (\Exception $e) {
          return $e;
      }
    }
}
