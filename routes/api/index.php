<?php

Route::group(['prefix'=>'index'], function(){
    Route::post("ingresar", "UserController@ingresar");
});
