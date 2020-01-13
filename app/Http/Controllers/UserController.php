<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
  DB,
  Hash
};
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
}
