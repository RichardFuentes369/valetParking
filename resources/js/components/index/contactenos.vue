<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Contactenos</h5>
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table">
                                <tr>
                                    <td>
                                        <label for=""><h5>Pais</h5></label>
                                    </td>
                                    <td>
                                        <label for=""><h5>{{model.pais}}</h5></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for=""><h5>Ciudad</h5></label>
                                    </td>
                                    <td>
                                        <label for=""><h5>{{model.ciudad}}</h5></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for=""><h5>Barrio</h5></label>
                                    </td>
                                    <td>
                                        <label for=""><h5>{{model.barrio}}</h5></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for=""><h5>Dirección</h5></label>
                                    </td>
                                    <td>
                                        <label for=""><h5>{{model.direccion}}</h5></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for=""><h5>Telefono</h5></label>
                                    </td>
                                    <td>
                                        <label for=""><h5>{{model.telefono}}</h5></label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <iframe :src="model.ubicacion_gps" width="500" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
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
                direccion: '',
                barrio: '',
                ciudad: '',
                pais: '',
                telefono: '',
                ubicacion_gps: ''
            },
        };
    },
    mounted() {
        this.informacionEmpresa()
    },
    methods: {
        informacionEmpresa() {
            axios.get(`${this.route}informacion`).then(res => {
              this.model = {
                direccion = res.data.direccion,
                barrio = res.data.barrio,
                ciudad = res.data.ciudad,
                pais = res.data.pais,
                telefono = res.data.telefono,
                ubicacion_gps = res.data.ubicacion_gps
              }
            })
        }
    }
}
</script>

<style lang="css" scoped>
</style>
