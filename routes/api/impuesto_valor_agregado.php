<?php

Route::group(['prefix'=>'impuesto'], function(){
    Route::get("listar-iva", "IvaController@lista");
    Route::post("crear-iva", "IvaController@crear");
    Route::delete('{id}/eliminar-iva', "IvaController@eliminar");
});
