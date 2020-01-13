<?php

Route::group(['prefix'=>'facturas'], function(){
    Route::get("lista-facturas", "FacturasController@lista");
});
