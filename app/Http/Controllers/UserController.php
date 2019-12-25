<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function ingresar(Request $request){
      try {
          return $request;
      } catch (\Exception $e) {
          return $e;
      }
    }
}
