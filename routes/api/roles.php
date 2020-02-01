<?php

Route::group(['prefix'=>'roles'], function(){
    Route::get("lista-roles", "RolesController@lista");
    Route::post("crear-rol", "RolesController@crear");
    Route::put("{id_rol}/actualizar-rol", "RolesController@actualizar");
    Route::delete('{id}/eliminar-rol', "RolesController@eliminar");
});
