<?
$controller = "UserController";

Route::group(['prefix'=>'index'], function(){
    Route::post("ingresar", "$controller@ingresar");
});
