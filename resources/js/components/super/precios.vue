<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title titulo">Precios</h5>
      <el-button class="alineacion" v-show="precios == ''" type="primary" icon="el-icon-plus" circle data-toggle="modal" data-target="#CrearPrecio"></el-button>
      <br>
      <div class="card-body">
        <div class="col-sm-12">
          <div class="row" v-for="precios of precios">
            <div class="col-sm-6">
              <div class="d-flex justify-content-center">
                <label for="" class="text-muted">
                  <h3>MOTO</h3>
                </label>
                <img src="img/motorcicle.png" alt="" style="margin-top: 2rem; margin-left: -10rem">
              </div>
              <table class="table">
                <tr>
                  <td>
                    <label for="">
                      <h5>Cuarto Moto</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.cuarto_moto" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="">
                      <h5>Media Moto</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.media_moto" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="">
                      <h5>Hora Moto</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.hora_moto" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="">
                      <h5>Semana Moto</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.semana_moto" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="">
                      <h5>Mes Moto</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.mes_moto" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-6">
              <div class="d-flex justify-content-center">
                <label for="" class="text-muted">
                  <h3>CARRO</h3>
                </label>
                <img src="img/car.jpg" alt="" style="margin-top: 2rem; margin-left: -10rem">
              </div>
              <table class="table">
                <tr>
                  <td>
                    <label for="">
                      <h5>Cuarto carro</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.cuarto_carro" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="">
                      <h5>Media carro</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.media_carro" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="">
                      <h5>Hora carro</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.hora_carro" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="">
                      <h5>Semana carro</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.semana_carro" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="">
                      <h5>Mes carro</h5>
                    </label>
                  </td>
                  <td>
                    <label for="">
                      <h5>
                        <input @change="actualizar_precio(precios)" type="number" v-model="precios.mes_carro" class="form-control" min="0">
                      </h5>
                    </label>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Crear Precio -->
    <div class="modal fade" id="CrearPrecio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title ml-auto" id="exampleModalLabel">Crear Precios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <label for="">Cuarto de Moto</label>
                <input type="number" v-model="model.cuarto_moto" class="form-control" min="0">
                <label for="">Media de Moto</label>
                <input type="number" v-model="model.media_moto" class="form-control" min="0">
                <label for="">Hora de Moto</label>
                <input type="number" v-model="model.hora_moto" class="form-control" min="0">
                <label for="">Semana de Moto</label>
                <input type="number" v-model="model.semana_moto" class="form-control" min="0">
                <label for="">Mes de Moto</label>
                <input type="number" v-model="model.mes_moto" class="form-control" min="0">
              </div>
              <div class="col-sm-6">
                <label for="">Cuarto de Carro</label>
                <input type="number" v-model="model.cuarto_carro" class="form-control" min="0">
                <label for="">Media de Carro</label>
                <input type="number" v-model="model.media_carro" class="form-control" min="0">
                <label for="">Hora de Carro</label>
                <input type="number" v-model="model.hora_carro" class="form-control" min="0">
                <label for="">Semana de Carro</label>
                <input type="number" v-model="model.semana_carro" class="form-control" min="0">
                <label for="">Mes de Carro</label>
                <input type="number" v-model="model.mes_carro" class="form-control" min="0">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="crear_precio">Crear</button>
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
      route: 'api/precios/',
      precios: [],
      model: {
        cuarto_moto: '',
        media_moto: '',
        hora_moto: '',
        semana_moto: '',
        mes_moto: '',
        cuarto_carro: '',
        media_carro: '',
        hora_carro: '',
        semana_carro: '',
        mes_carro: '',
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      }
    };
  },
  mounted() {
    this.lista_precios()
  },
  methods: {
    limpir() {
      this.model = {
        cuarto_moto: '',
        media_moto: '',
        hora_moto: '',
        semana_moto: '',
        mes_moto: '',
        cuarto_carro: '',
        media_carro: '',
        hora_carro: '',
        semana_carro: '',
        mes_carro: '',
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      }
    },
    lista_precios() {
      axios.get(`${this.route}lista-precios`).then(res => {
        this.precios = res.data
      })
    },
    async crear_precio() {
      await axios.post(`${this.route}crear-precios`, this.model)
      this.$notify({
        title: 'Success',
        message: 'Precio Creado exitosamente',
        type: 'success'
      });
      $('#CrearPrecio').modal('hide'),
      this.lista_precios(),
      this.limpiar()
    },
    async actualizar_precio(precios) {
      this.model = {
        cuarto_moto: precios.cuarto_moto,
        media_moto: precios.media_moto,
        hora_moto: precios.hora_moto,
        semana_moto: precios.semana_moto,
        mes_moto: precios.mes_moto,
        cuarto_carro: precios.cuarto_carro,
        media_carro: precios.media_carro,
        hora_carro: precios.hora_carro,
        semana_carro: precios.semana_carro,
        mes_carro: precios.mes_carro
      },
      await axios.put(`${this.route}actualizar-precios`, this.model)
      this.$notify({
        title: 'Success',
        message: 'Precio Actualizado exitosamente',
        type: 'success'
      });
      this.lista_precios(),
      this.limpiar()
    }
  }
}
</script>

<style lang="css" scoped>
.alineacion{
  margin-top: 0%;
  margin-left: 90%;
}
.titulo{
  color: white;
  padding: 1rem;
  border-left: 6px solid blue;
  background-color: lightgrey;
  font-family: cursive, sans-serif;
}
</style>
