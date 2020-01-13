<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\facturas;
class FacturasController extends Controller
{
  public function lista(){
    try {
        $consulta = facturas::get();
        return $consulta;
    } catch (\Exception $e) {
        return $e;
    }
  }
}
