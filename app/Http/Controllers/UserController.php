<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\usuarios;

class UserController extends Controller
{
    public function ingresar(Request $request){
        try {
            // DB::transaction(function () {
                $consulta = usuarios::get();
                return $consulta;
            // }, 5);
        } catch (\Exception $e) {
            return $e;
        }
    }
}
