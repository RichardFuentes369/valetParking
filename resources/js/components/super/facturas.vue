<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Facturas</h5>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Estado</th>
                <th scope="col">Cliente</th>
                <th scope="col">Descuento</th>
                <th scope="col">Iva</th>
                <th scope="col">Precio</th>
                <th scope="col">created_by</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_At</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(rol, index) in roles">
                <th scope="row">{{rol.id}}</th>
                <td>{{rol.nombre}}</td>
                <td>{{rol.descripcion}}</td>
                <td>{{rol.created_at | fecha}}</td>
                <td>{{rol.deleted_at | fecha}}</td>
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
      facturas: []
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
    this.lista_facturas()
  },
  methods: {
    lista_facturas() {
      axios.get(`${this.route}lista-facturas`).then(res => {
        this.facturas = res.data
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
</style>
