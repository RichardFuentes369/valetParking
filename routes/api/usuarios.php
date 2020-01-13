<?php

Route::group(['prefix'=>'usuarios'], function(){
    Route::get("lista-usuarios", "UserController@lista");
});
