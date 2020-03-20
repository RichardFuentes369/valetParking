<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Empleados</h5>
        <div class="card-body scroll-y">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Empleado</th>
                <th scope="col">Facturas</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="rendimiento in rendimiento">
                <th scope="row">{{rendimiento.nombre}}</th>
                <td>{{rendimiento.cobradas}}</td>
                <td>{{rendimiento.total}}</td>
              </tr>
            </tbody>
          </table>
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
      rendimiento: []
    };
  },
  mounted() {
    this.listar()
  },
  methods: {
    async listar(){
      await axios.get(`${this.route}listar-facturas`).then(res => {
        this.rendimiento = res.data
      })
    }
  }
};
</script>

<style lang="css" scoped>
.titulo{
  color: white;
  padding: 1rem;
  border-left: 6px solid blue;
  background-color: lightgrey;
  font-family: cursive, sans-serif;
}

.scroll-y{
  height: 26rem;
  width: 100%;
  overflow-y: auto;
}
</style>
