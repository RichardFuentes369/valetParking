<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\usuarios;


class UserController extends Controller
{
    public function ingresar(Request $request){
      try {
          $consulta = usuarios::get();
          return $consulta;
      } catch (\Exception $e) {
          return $e;
      }
    }
}
