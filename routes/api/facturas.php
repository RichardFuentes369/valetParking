<?php

Route::group(['prefix'=>'facturas'], function(){
	Route::get("lista-facturas-cobradas", "FacturasController@listaCobradas");
	Route::get("lista-facturas-por-cobrar", "FacturasController@listaPorCobrar");
	Route::put("{id_factura}/actualizar-estado-factura", "FacturasController@cobrarFactura");
	Route::post("crear-factura", "FacturasController@crear");
	Route::get("{id_factura}/consulta-factura", "FacturasController@listaDetallada");
	Route::put("marcar-corte", "FacturasController@marcarCorte");

	Route::get("listar-facturas", "FacturasController@ListarFacturas");
});
