<template>
  <div>
    <!-- <el-button :icon="this.icon" circle @click="ocultarmostrar"></el-button> -->
    <el-menu default-active="2" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
      <span @click="ocultarmostrar">
        <p class="font-weight-bolder cursor-pointer">Menú <i :class="this.icon" /></p>
      </span>
      <!-- user -->
      <el-submenu index="1">
        <template slot="title">
          <i class="el-icon-user"></i>
          <span slot="title">Perfiles</span>
        </template>
        <el-menu-item index="1-3">
          <router-link :to="{ name: 'rol'}" class="nav-link">Roles</router-link>
        </el-menu-item>
      </el-submenu>
      <!-- pagos -->
      <el-submenu index="2">
        <template slot="title">
          <i class="el-icon-bank-card"></i>
          <span slot="title">Formas de Pago</span>
        </template>
        <el-menu-item index="2-1">
          <router-link :to="{ name: 'descuentos'}" class="nav-link">Descuentos</router-link>
        </el-menu-item>
        <el-menu-item index="2-2">
          <router-link :to="{ name: 'iva'}" class="nav-link">Iva</router-link>
        </el-menu-item>
        <el-menu-item index="2-3">
          <router-link :to="{ name: 'precios'}" class="nav-link">Precios</router-link>
        </el-menu-item>
      </el-submenu>
      <!-- menu -->
      <el-submenu index="3">
        <template slot="title">
          <i class="el-icon-menu"></i>
          <span slot="title">Ver</span>
        </template>
        <el-menu-item index="4-1" class="nav-item">
          <router-link :to="{ name: 'facturas'}" class="nav-link">Facturas</router-link>
        </el-menu-item>
        <el-menu-item index="4-4-1" class="nav-item">
          <router-link :to="{ name: 'empleados'}" class="nav-link">Empleado</router-link>
        </el-menu-item>
      </el-submenu>
      <!-- configurar mision vision -->
      <el-submenu index="4">
        <template slot="title">
          <i class="el-icon-s-claim"></i>
          <span slot="title">Configurar</span>
        </template>
        <el-menu-item index="4-1" class="nav-item">
          <router-link :to="{ name: 'informaciona'}" class="nav-link">Misión/Visión</router-link>
        </el-menu-item>
      </el-submenu>
      <!-- configuracion -->
      <el-menu-item index="3">
        <i class="el-icon-setting"></i>
        <span slot="title">Confiigurar</span>
      </el-menu-item>
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
