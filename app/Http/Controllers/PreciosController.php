<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\precios;

class PreciosController extends Controller
{
  public function lista(){
    try {
      $consulta = precios::get();
      return $consulta;
    } catch (\Exception $e) {
      return $e;
    }
  }

  public function crear(Request $request){
    try {
      $nuevo_registro = new precios();
      $nuevo_registro->cuarto_moto = $request->cuarto_moto;
      $nuevo_registro->media_moto = $request->media_moto;
      $nuevo_registro->hora_moto = $request->hora_moto;
      $nuevo_registro->semana_moto = $request->semana_moto;
      $nuevo_registro->mes_moto = $request->mes_moto;
      $nuevo_registro->cuarto_carro = $request->cuarto_carro;
      $nuevo_registro->media_carro = $request->media_carro;
      $nuevo_registro->hora_carro = $request->hora_carro;
      $nuevo_registro->semana_carro = $request->semana_carro;
      $nuevo_registro->mes_carro = $request->mes_carro;
      $nuevo_registro->save();
      return 'precio creado exitosamente';
    } catch (\Exception $e) {
        return $e;
    }
  }

  public function actualizar(Request $request){
    try {
      $nuevo_registro = precios::first();
      $nuevo_registro->cuarto_moto = $request->cuarto_moto;
      $nuevo_registro->media_moto = $request->media_moto;
      $nuevo_registro->hora_moto = $request->hora_moto;
      $nuevo_registro->semana_moto = $request->semana_moto;
      $nuevo_registro->mes_moto = $request->mes_moto;
      $nuevo_registro->cuarto_carro = $request->cuarto_carro;
      $nuevo_registro->media_carro = $request->media_carro;
      $nuevo_registro->hora_carro = $request->hora_carro;
      $nuevo_registro->semana_carro = $request->semana_carro;
      $nuevo_registro->mes_carro = $request->mes_carro;
      $nuevo_registro->save();
      return 'precio actualizado exitosamente';
    } catch (\Exception $e) {
        return $e;
    }
  }
}
