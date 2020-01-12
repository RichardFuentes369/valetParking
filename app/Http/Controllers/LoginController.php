<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
  DB,
  Hash,
  Auth
};
use App\Models\usuarios;

class LoginController extends Controller
{
  public function ingresar(Request $request){
    try {
      // DB::transaction(function () {
        $consulta = usuarios::where('email',$request->email)->first();
        if ($consulta){
          if(Hash::check($request->password, $consulta->password)){
              $credentials = $this->validate(request(), [
                  'email' => 'email|required|string',
                  'password' => 'required|string'
              ]);
            if (Auth::attempt($credentials)) {
              return 'estas logeado';
            } else {
              return 'error en el auth::attempt';
            }
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

  // public function __construct()
  // {
  //     $this->middleware('auth');
  // }

  public function salir(){
    try {
      Auth::logout();
      return 'saliendo del sistema';
    } catch (\Exception $e) {
      return $e;
    }
  }
}
