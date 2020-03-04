<?php

Route::group(['prefix'=>'impuesto'], function(){
	Route::get("listar-iva", "IvaController@lista");
	Route::post("crear-iva", "IvaController@crear");
	Route::put("{id_iva}/actualizar-iva", "IvaController@actualizar");
	Route::delete('{id}/eliminar-iva', "IvaController@eliminar");
});
