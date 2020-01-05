<template>
<div>
    <!-- <el-button :icon="this.icon" circle @click="ocultarmostrar"></el-button> -->
    <el-menu default-active="2" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
        <span @click="ocultarmostrar">
            <p class="font-weight-bolder cursor-pointer">Menú <i :class="this.icon" /></p>
        </span>
        <el-submenu index="1">
            <template slot="title">
                <i class="el-icon-location"></i>
                <span slot="title">Navigator One</span>
            </template>
            <el-menu-item-group>
                <span slot="title">Group One</span>
                <el-menu-item index="1-1">item one</el-menu-item>
                <el-menu-item index="1-2">item two</el-menu-item>
            </el-menu-item-group>
            <el-menu-item-group title="Group Two">
                <el-menu-item index="1-3">item three</el-menu-item>
            </el-menu-item-group>
            <el-submenu index="1-4">
                <span slot="title">item four</span>
                <el-menu-item index="1-4-1">item one</el-menu-item>
            </el-submenu>
        </el-submenu>
        <el-menu-item index="2">
            <i class="el-icon-menu"></i>
            <span slot="title">Navigator Two</span>
        </el-menu-item>
        <el-menu-item index="3" disabled>
            <i class="el-icon-document"></i>
            <span slot="title">Navigator Three</span>
        </el-menu-item>
        <el-menu-item index="4">
            <i class="el-icon-setting"></i>
            <span slot="title">Navigator Four</span>
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
}
</script>
