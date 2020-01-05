import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import Login from './components/index/login'
import Mision from './components/index/mision'
import Programadores from './components/index/programadores'
import Contactenos from './components/index/contactenos'

import Precios from './components/super/precios'
import Descuentos from './components/super/descuentos'
import Iva from './components/super/iva'
import Informacion from './components/super/informacion'
import Roles from './components/super/roles'
import Usuarios from './components/super/usuarios'
import Facturas from './components/super/facturas'
import Periodos from './components/super/periodos'
import Empleados from './components/super/empleados'

export default new Router({
  routes: [
    {
      path: '/',
      name: 'login',
      component: Login
    },
    {
      path: '/mision',
      name: 'mision',
      component: Mision
    },
    {
      path: '/programadores',
      name: 'programadores',
      component: Programadores
    },
    {
      path: '/contactos',
      name: 'contactenos',
      component: Contactenos
    },

    //administrador

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
      path: '/informacion',
      name: 'informacion',
      component: Informacion
    },
    {
      path: '/roles',
      name: 'roles',
      component: Roles
    },
    {
      path: '/usuarios',
      name: 'usuarios',
      component: Usuarios
    },
    {
      path: '/facturas',
      name: 'facturas',
      component: Facturas
    },
    {
      path: '/periodos',
      name: 'periodos',
      component: Periodos
    },
    {
      path: '/empleados',
      name: 'empleados',
      component: Empleados
    },
  ],
  mode: 'history'
})
