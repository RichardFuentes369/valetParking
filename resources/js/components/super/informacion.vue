<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">informacion</h5>
            <div class="card-body">

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
                mision: '',
                vision: '',
                direccion: '',
                barrio: '',
                ciudad: '',
                telefono: '',
                ubicacion_gps: ''
            },
        };
    },
    mounted() {
        this.informacion()
    },
    methods: {
        informacion() {
            axios.get(`${this.route}informacion`).then(res => {
                this.model = {
                  mision: res.data.mision,
                  vision: res.data.vision,
                  direccion: res.data.direccion,
                  barrio: res.data.barrio,
                  ciudar: res.data.ciudad,
                  telefono: res.data.telefono,
                  ubicacion_gps: res.data.ubicacion_gps
                }
            })
        }
    }
}
</script>

<style lang="css" scoped>
</style>
