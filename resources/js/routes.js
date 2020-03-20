import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import Login from './components/index/login'
import InformacionI from './components/index/informacion'
import Programadores from './components/index/programadores'

import Precios from './components/super/precios'
import Descuentos from './components/super/descuentos'
import Iva from './components/super/iva'
import InformacionA from './components/super/informacion'
import Rol from './components/super/rol'
import Facturas from './components/super/facturas'
import Cortes from './components/super/cortes'
import Empleados from './components/super/empleados'
import ConfigurarS from './components/super/configurar'

import CrarFactura from './components/empleado/crearfactura.vue'
import CobrarFactura from './components/empleado/cobrarfactura.vue'
import RegistroCliente from './components/empleado/registro.vue'
import ConfigurarE from './components/empleado/configurar.vue'

export default new Router({
  routes: [
  {
    path: '/',
    name: 'login',
    component: Login
  },
  {
    path: '/informacioni',
    name: 'informacioni',
    component: InformacionI
  },
  {
    path: '/programadores',
    name: 'programadores',
    component: Programadores
  },
  /*administrador*/
  {
    path: '/precios',
    name: 'precios',
    component: Precios
  },
  {
    path: '/descuentos',
    name: 'descuentos',
    component: Descuentos
  },
  {
    path: '/iva',
    name: 'iva',
    component: Iva
  },
  {
    path: '/informaciona',
    name: 'informaciona',
    component: InformacionA
  },
  {
    path: '/rol',
    name: 'rol',
    component: Rol
  },
  {
    path: '/facturas',
    name: 'facturas',
    component: Facturas
  },
  {
    path: '/corte',
    name: 'corte',
    component: Cortes
  },
  {
    path: '/empleados',
    name: 'empleados',
    component: Empleados
  },   
  {
    path: '/configurar-super',
    name: 'configurar-super',
    component: ConfigurarS
  },  
  /*empleado*/
  {
    path: '/crear-factura',
    name: 'crear-factura',
    component: CrarFactura
  },
  {
    path: '/cobrar-factura',
    name: 'cobrar-factura',
    component: CobrarFactura
  },  
  {
    path: '/registro-clientes',
    name: 'registro-clientes',
    component: RegistroCliente
  }, 
  {
    path: '/configurar-empleado',
    name: 'configurar-empleado',
    component: ConfigurarE
  },
  ],
  mode: 'history'
})
