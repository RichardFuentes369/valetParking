<?php

Route::group(['prefix'=>'index'], function(){
    Route::post("ingresar", "LoginController@ingresar");
});
