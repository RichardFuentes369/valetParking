<?php

Route::group(['prefix'=>'clientes'], function(){
    Route::get("lista-clientes", "ClientesController@lista");
    Route::post("crear-cliente", "ClientesController@crear");
});
