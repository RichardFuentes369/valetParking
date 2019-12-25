<template>
  <div>
    <el-menu
    :default-active="activeIndex2"
    class="el-menu-demo"
    mode="horizontal"
    @select="handleSelect"
    background-color="#545c64"
    text-color="#fff"
    active-text-color="#ffd04b">
    <el-menu-item index="1">Valet Parking</el-menu-item>
    <el-submenu index="2">
      <template slot="title">Sobre Nosotros</template>
      <el-menu-item index="2-1">Misión</el-menu-item>
      <el-menu-item index="2-2">Visión</el-menu-item>
      <el-submenu index="2-4">
        <template slot="title">Más</template>
        <el-menu-item index="2-4-1">Contactos</el-menu-item>
        <el-menu-item index="2-4-2">Programadores</el-menu-item>
      </el-submenu>
    </el-submenu>
  </el-menu>
  </div>
</template>

<script>
export default {
    data() {
      return {
        activeIndex: '1',
        activeIndex2: '1'
      };
    },
    methods: {
      handleSelect(key, keyPath) {
        console.log(key, keyPath);
      }
    }
  }
</script>

<style lang="css" scoped>
</style>
