<template>
  <div>
    <!-- <el-button :icon="this.icon" circle @click="ocultarmostrar"></el-button> -->
    <el-menu default-active="2" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
      <span @click="ocultarmostrar">
        <p class="font-weight-bolder cursor-pointer">Menú <i :class="this.icon" /></p>
      </span>
      <!-- menu -->
      <el-submenu index="1">
        <template slot="title">
          <i class="el-icon-menu"></i>
          <span slot="title">Acciones</span>
        </template>
        <el-menu-item index="1-1" class="nav-item">
          <router-link :to="{ name: 'registro-clientes'}" class="nav-link">Registrar Clientes</router-link>
        </el-menu-item>
        <el-menu-item index="1-2" class="nav-item">
          <router-link :to="{ name: 'crear-factura'}" class="nav-link">Crear Factura</router-link>
        </el-menu-item>
        <el-menu-item index="1-3" class="nav-item">
          <router-link :to="{ name: 'cobrar-factura'}" class="nav-link">Cobrar Factura</router-link>
        </el-menu-item>
      </el-submenu>
      <!-- configuracion configurarE-->
      <el-submenu index="2">
        <template slot="title">
          <i class="el-icon-setting"></i>
          <span slot="title">Configurar</span>
        </template>
        <el-menu-item index="2-1">
          <router-link :to="{ name: 'configurar-empleado'}" class="nav-link">Configurar</router-link>
        </el-menu-item>
      </el-submenu>
    </el-menu>
  </div>
</template>

<style>
.el-menu-vertical-demo:not(.el-menu--collapse) {
  width: 200px;
  min-height: 400px;
}

.cursor-pointer {
  cursor: pointer;
}
</style>

<script>
export default {
  data() {
    return {
      isCollapse: true,
      icon: 'el-icon-caret-right'
    };
  },
  methods: {
    ocultarmostrar() {
      if (this.isCollapse) {
        this.isCollapse = false
        this.icon = 'el-icon-caret-left'
      } else {
        this.isCollapse = true
        this.icon = 'el-icon-caret-right'
      }
    },
    handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    }
  }
};
</script>
