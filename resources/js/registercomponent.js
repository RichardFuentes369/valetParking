import Vue from 'vue'

Vue.component('navi', require('./components/navs/Nav.vue').default);
Vue.component('login', require('./components/index/login.vue').default);
Vue.component('informacioni', require('./components/index/informacion.vue').default);
Vue.component('programadores', require('./components/index/programadores.vue').default);

Vue.component('navs', require('./components/navs/NavS.vue').default);
Vue.component('navla', require('./components/navs/NavLeftAmin.vue').default);

Vue.component('precios', require('./components/super/precios.vue').default);
Vue.component('descuentos', require('./components/super/descuentos.vue').default);
Vue.component('informacion', require('./components/super/informacion.vue').default);
Vue.component('iva', require('./components/super/iva.vue').default);
Vue.component('rol', require('./components/super/rol.vue').default);
Vue.component('facturas', require('./components/super/facturas.vue').default);
Vue.component('facturaCobrada', require('./components/super/facturas/facturas-cobradas.vue').default);
Vue.component('facturaPorCobrar', require('./components/super/facturas/facturas-por-cobrar.vue').default);
Vue.component('periodos', require('./components/super/periodos.vue').default);
Vue.component('empleados', require('./components/super/empleados.vue').default);

Vue.component('navle', require('./components/navs/NavLeftEmpleado.vue').default);
Vue.component('cobrar-factura', require('./components/empleado/cobrarfactura.vue').default);
Vue.component('crear-factura', require('./components/empleado/crearfactura.vue').default);
Vue.component('registro-clientes', require('./components/empleado/registro.vue').default);
Vue.component('calculadora', require('./components/empleado/calculadora.vue').default);




