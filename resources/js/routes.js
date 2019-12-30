import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import Login from './components/index/login'
import Mision from './components/index/mision'
import Programadores from './components/index/programadores'
import Contactenos from './components/index/contactenos'

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
    }
  ],
  mode: 'history'
})
