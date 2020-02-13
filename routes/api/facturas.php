<?php

Route::group(['prefix'=>'facturas'], function(){
    Route::get("lista-facturas", "FacturasController@lista");
    Route::post("crear-factura", "FacturasController@crear");
});
