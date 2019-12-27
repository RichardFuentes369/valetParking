<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\usuarios;

class UserController extends Controller
{
    public function ingresar(Request $request){
        try {
            // DB::transaction(function () {
                $consulta = usuarios::where('correo',$request->name)->first();
                if ($consulta){
                    if(Hash::check($request->password, $consulta->contrasena)){
                        return 'logeado';
                    } else {
                        return 'la contrasena es incorrecta';
                    }
                } else {
                    return 'el correo no existe';
                }
            // }, 5);
        } catch (\Exception $e) {
            return $e;
        }
    }
}
