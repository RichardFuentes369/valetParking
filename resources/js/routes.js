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
import Empleados from './components/super/empleados'

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
    path: '/empleados',
    name: 'empleados',
    component: Empleados
  },
  ],
  mode: 'history'
})
