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

      }
    }
}
