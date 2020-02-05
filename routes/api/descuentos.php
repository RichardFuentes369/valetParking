<?php

Route::group(['prefix'=>'descuentos'], function(){
    Route::get("lista-descuentos", "DescuentosController@lista");
    Route::post("crear-descuento", "DescuentosController@crear");
    Route::put("{id}/actualizar-descuento", "DescuentosController@actualizar");
    Route::delete("{id}/eliminar-descuento", "DescuentosController@eliminar");
});
