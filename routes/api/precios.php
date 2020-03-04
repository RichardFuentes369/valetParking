<?php

Route::group(['prefix'=>'precios'], function(){
	Route::get("lista-precios", "PreciosController@lista");
	Route::post("crear-precios", "PreciosController@crear");
	Route::put("actualizar-precios", "PreciosController@actualizar");
});
