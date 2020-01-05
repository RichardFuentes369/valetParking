<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Iniciar Seccion</h5>
            <div class="card-body">
                <label for="name">Correo</label>
                <el-input placeholder="Please input" v-model="model.name"></el-input>
                <label for="password">Contraseña</label>
                <el-input placeholder="Please input password" v-model="model.password" show-password></el-input>
                <br><br>
                <button type="button" class="btn btn-primary btn-block" @click="ingresar">Ingresar</button>
            </div>
            <div class="card-footer text-muted text-center">
                Recuerda cambiar la contraseña periodicamente
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            route: 'api/index/',
            model: {
                name: '',
                password: ''
            },
        };
    },
    methods: {
        ingresar() {
            axios.post(`${this.route}ingresar`, this.model)
        }
    }
}
</script>

<style lang="css" scoped>
</style>
