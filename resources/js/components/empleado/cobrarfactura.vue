<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Cobrar Factura</h5>

        <!-- <div class="card-body">
          <div class="row mt-xl-n5">
            <div v-for="factura in facturas" class="card mx-3 my-2 mt-5" style="width: 16rem">
              <div class="card-body">
                <h5 class="card-title text-center text-uppercase">
                  {{factura.placa}}
                </h5>
                <img v-if="factura.tipo_vehiculo == 1" src="img/motorcicle.png" alt="" style="margin-top: 2rem">
                <img v-else src="img/car.jpg" alt="" style="margin-top: 2rem">
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#Cobrar">Cobrar</button>
              </div>
            </div>
          </div>
        </div> -->
<!--         <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Placa</th>
                <th scope="col">Tipo Vehiculo</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="factura in facturas">
                <th scope="row">1</th>
                <td>{{factura.placa}}</td>
                <td>
                  <span v-if="factura.tipo_vehiculo == 1" style="color: blue">Moto</span>
                  <span v-else style="color:red">Carro</span>                  
                </td>
              </tr>
            </tbody>
          </table>
        </div> -->

      </div>
    </div>

    <!-- Modal Cobrar -->
    <div class="modal fade" id="Cobrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cobrar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>
              aca sale una facturita, quien creo el servicio, cuando lo creo <br>
              precio unitario, precio total, fecha inicio con hora, fecha fin con hora <br>
              quien cobro el servicio, y quien lo creo, tipo de descuento, iva <br>
              placa,   
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Cobrar</button>
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
      route: 'api/facturas/',
      facturas: [],
      conteo: ''
    };
  },
  mounted() {
    this.listar_facturas()
  },
  methods: {
    async listar_facturas() {
      await axios.get(`${this.route}lista-facturas`).then(res => {
        this.facturas = res.data
      })
      this.conteo = this.facturas.length
    }
  }
}
</script>

<style lang="css" scoped>
.titulo{
  color: white;
  padding: 1rem;
  border-left: 6px solid blue;
  background-color: lightgrey;
  font-family: cursive, sans-serif;
}
.tres-puntos{
  width: 100%;
  height: 39px;
  font-size: 12pt;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
</style>
