<template>
  <div>
    <h5 class="card-title subtitulo">Facturas Cobradas</h5>
    <div class="card">
      <div class="card-body scroll-y">
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Placa</th>
                <th scope="col">Total Pago</th>
                <th scope="col">Tipo Cliente</th>
                <th scope="col">Creado Por</th>
                <th scope="col">Fecha de Creación</th>
                <th scope="col">Fecha de Pago</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(cobrada, key) in cobradas">
                <td scope="col">{{key+1}}/td>
                <td scope="col">{{cobrada.cliente.nombre}} {{cobrada.cliente.apellido}}</td>
                <td scope="col">{{cobrada.placa}}</td>
                <td scope="col">{{cobrada.cliente.asociado}}</td>
                <td scope="col">{{cobrada.total}}</td>
                <th scope="col">{{cobrada.created_by}}</th>
                <td scope="col">{{cobrada.created_at}}</td>
                <td scope="col">{{cobrada.updated_by}}</td>
              </tr> 
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment'
export default {
  data() {
    return {     
      route: 'api/facturas/',
      cobradas: [],
    };
  },
  filters: {
    fecha: function(value) {
      if (!value) return 'no tiene fecha'
        value = moment(value).format('LLL');
      return value
    }
  },
  mounted() {
    this.facturasCobradas()
  },
  methods: {
    facturasCobradas() {
      axios.get(`${this.route}lista-facturas-cobradas`).then(res => {
        this.cobradas = res.data
      })
    }
  }
};
</script>

<style lang="css" scoped>
.subtitulo{
  color: white;
  padding: 1rem;
  border-left: 6px solid blue;
  background-color: lightgrey;
  font-family: cursive, sans-serif;
}

.scroll-y{
  height: 20rem;
  width: 100%;
  overflow-y: auto;
}
</style>
