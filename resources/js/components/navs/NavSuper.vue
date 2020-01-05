<template>
<div>
    <el-menu :default-active="activeIndex2" class="el-menu-demo" mode="horizontal" @select="handleSelect" background-color="#545c64" text-color="#fff" active-text-color="#ffd04b">
        <el-menu-item index="1">
            <router-link class="nav-link" :to="{ name: 'login'}">Valet Parking</router-link>
        </el-menu-item>
        <el-submenu index="2">
            <template slot="title">Configurar Sistema</template>
            <el-menu-item index="2-1" class="nav-item">
                <router-link :to="{ name: 'precios'}" class="nav-link">Precios</router-link>
            </el-menu-item>
            <el-menu-item index="2-4-1" class="nav-item">
                <router-link :to="{ name: 'descuentos'}" class="nav-link">Descuentos</router-link>
            </el-menu-item>
            <el-menu-item index="2-4-2" class="nav-item">
                <router-link :to="{ name: 'iva'}" class="nav-link">Iva</router-link>
            </el-menu-item>
            <el-menu-item index="2-4-3" class="nav-item">
                <router-link :to="{ name: 'informacion'}" class="nav-link">Informacion de la empresa</router-link>
            </el-menu-item>
        </el-submenu>
        <el-submenu index="3">
            <template slot="title">Roles y Usuarios</template>
            <el-menu-item index="3-1" class="nav-item">
                <router-link :to="{ name: 'roles'}" class="nav-link">Roles</router-link>
            </el-menu-item>
            <el-menu-item index="3-4-1" class="nav-item">
                <router-link :to="{ name: 'usuarios'}" class="nav-link">Usuarios</router-link>
            </el-menu-item>
        </el-submenu>
        <el-submenu index="4">
            <template slot="title">Detalles</template>
            <el-menu-item index="4-1" class="nav-item">
                <router-link :to="{ name: 'facturas'}" class="nav-link">Facturas</router-link>
            </el-menu-item>
            <el-menu-item index="4-4-1" class="nav-item">
                <router-link :to="{ name: 'periodos'}" class="nav-link">Periodos</router-link>
            </el-menu-item>
            <el-menu-item index="4-4-2" class="nav-item">
                <router-link :to="{ name: 'empleados'}" class="nav-link">Empleado</router-link>
            </el-menu-item>
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
            // console.log(key, keyPath);
        }
    }
}
</script>

<style lang="css" scoped>
</style>
