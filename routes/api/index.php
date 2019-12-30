<?php

Route::group(['prefix'=>'index'], function(){
    Route::post("ingresar", "LoginController@ingresar");
    Route::get("mision-vision", "InformacionEmpresaController@MisionVision");
});
