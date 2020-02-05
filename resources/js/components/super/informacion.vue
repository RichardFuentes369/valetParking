<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Información</h5>
            <br>
            <div class="card-body mt-5">
                <div class="row mt-xl-n5">
                    <div class="mx-auto" style="width: 44rem">
                        <div class="card-body">
                            <h4 class="card-text text-center text-muted">Mision</h4>
                            <h1>{{informacion.mision}}</h1>
                        </div>
                    </div>
                    <div class="mx-auto" style="width: 44rem">
                        <div class="card-body">
                            <h4 class="card-text text-center text-muted">Vision</h4>
                            <h1>{{informacion.vision}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-6">
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td><h4 class="text-muted text-center">Direccion</h4></td>
                        <td class="text-center">{{informacion.direccion}}</td>
                      </tr>
                      <tr>
                        <td><h4 class="text-muted text-center">Barrio</h4></td>
                        <td class="text-center">{{informacion.barrio}}</td>
                      </tr>
                      <tr>
                        <td><h4 class="text-muted text-center">Ciudad</h4></td>
                        <td class="text-center">{{informacion.ciudad}}</td>
                      </tr>
                      <tr>
                        <td><h4 class="text-muted text-center">Pais</h4></td>
                        <td class="text-center">{{informacion.pais}}</td>
                      </tr>
                      <tr>
                        <td><h4 class="text-muted text-center">Telefono</h4></td>
                        <td class="text-center">{{informacion.telefono}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-sm-6 text-center">
                  <h3>aca va a ir la url del mapa</h3>
                  <iframe :src="informacion.ubicacion_gps" width="500" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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
            informacion: {
                mision: '',
                vision: '',
                ubicacion_gps: '',
                direccion: '',
                barrio: '',
                ciudad: '',
                pais: '',
                telefono: ''
            }
        };
    },
    mounted() {
        this.mision()
    },
    methods: {
        mision() {
            axios.get(`${this.route}informacion`).then(res => {
                this.informacion.mision = res.data.mision
                this.informacion.vision = res.data.vision
                this.informacion.ubicacion_gps = res.data.ubicacion_gps
                this.informacion.direccion = res.data.direccion
                this.informacion.barrio = res.data.barrio
                this.informacion.ciudad = res.data.ciudad
                this.informacion.pais = res.data.pais
                this.informacion.telefono = res.data.telefono
            })
        }
    }
}
</script>

<style lang="css" scoped>
</style>
