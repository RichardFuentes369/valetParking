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
      $nuevo_registro->ano_moto = $request->ano_moto;
      $nuevo_registro->mes_moto = $request->mes_moto;
      $nuevo_registro->dia_moto = $request->dia_moto;
      $nuevo_registro->hora_moto = $request->hora_moto;
      $nuevo_registro->minuto_moto = $request->minuto_moto;
      $nuevo_registro->segundo_moto = $request->segundo_moto;
      $nuevo_registro->ano_carro = $request->ano_carro;
      $nuevo_registro->mes_carro = $request->mes_carro;
      $nuevo_registro->dia_carro = $request->dia_carro;
      $nuevo_registro->hora_carro = $request->hora_carro;
      $nuevo_registro->minuto_carro = $request->minuto_carro;
      $nuevo_registro->segundo_carro = $request->segundo_carro;
      $nuevo_registro->created_by = $request->usuario_logeado;  
      $nuevo_registro->save();
      return 'precio creado exitosamente';
    } catch (\Exception $e) {
      return $e;
    }
  }

  public function actualizar(Request $request){
    try {
      $nuevo_registro = precios::first();
      $nuevo_registro->ano_moto = $request->ano_moto;
      $nuevo_registro->mes_moto = $request->mes_moto;
      $nuevo_registro->dia_moto = $request->dia_moto;
      $nuevo_registro->hora_moto = $request->hora_moto;
      $nuevo_registro->minuto_moto = $request->minuto_moto;
      $nuevo_registro->segundo_moto = $request->segundo_moto;
      $nuevo_registro->ano_carro = $request->ano_carro;
      $nuevo_registro->mes_carro = $request->mes_carro;
      $nuevo_registro->dia_carro = $request->dia_carro;
      $nuevo_registro->hora_carro = $request->hora_carro;
      $nuevo_registro->minuto_carro = $request->minuto_carro;
      $nuevo_registro->segundo_carro = $request->segundo_carro;
      $nuevo_registro->save();
      return 'precio actualizado exitosamente';
    } catch (\Exception $e) {
      return $e;
    }
  }
}
