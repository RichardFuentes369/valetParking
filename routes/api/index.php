<?php

Route::group(['prefix'=>'index'], function(){
	Route::post("ingresar", "LoginController@ingresar");
	Route::get("informacion", "InformacionEmpresaController@informacion");
	Route::put("actualizar-informacion", "InformacionEmpresaController@actualizar");
});
