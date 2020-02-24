<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Cobrar Factura</h5>
        <el-input placeholder="Buscar por id"> <i slot="prefix" class="el-input__icon el-icon-search" /></el-input>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Placa</th>
                <th scope="col">Tipo Vehiculo</th>
                <th scope="col">Fecha Creacion</th>
                <th scope="col">Opción</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(factura, key) in facturas">
                <td scope="row" class="font-italic">{{factura.id}}</th>
                  <td>{{factura.placa}}</td>
                  <td>
                    <span v-if="factura.tipo_vehiculo == 1" style="color: blue">Moto</span>
                    <span v-else style="color:red">Carro</span>                  
                  </td>
                  <td>{{factura.created_at | fecha}}</td>
                  <td>
                   <button class="btn btn-success btn-block" data-toggle="modal" data-target="#CobrarFactura">Cobrar</button>
                 </td>
               </tr>
             </tbody>
           </table>
           <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item" v-if="pagination.current_page > 1">
                <a class="page-link" @click.prevent="changePage(pagination.current_page - 1)" href="#">
                  <span>
                    Atras
                  </span>
                </a>
              </li>
              <li class="page-item" v-bind:class="[ page == isActived ? 'active' : '']" v-for="page in pagesNumber">
                <a class="page-link" @click.prevent="changePage(page)" href="#">
                  {{ page }}
                </a>
              </li>
              <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                <a class="page-link" @click.prevent="changePage(pagination.current_page + 1)" href="#">
                  <span>
                    Siguiente
                  </span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- Modal Cobrar -->
    <div class="modal fade" id="CobrarFactura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
import moment from 'moment'
export default {
  data() {
    return {
      route: 'api/facturas/',
      facturas: [],
      pagination: [],
      offset: 2,
      conteo: ''
    };
  },
  filters: {
    fecha: function(value) {
      if (!value) return 'no tiene fecha'
        value = moment(value).format('LLL');
      return value
    }
  },
  computed: {
    isActived: function() {
      return this.pagination.current_page;
    },
    pagesNumber: function() {
      if (!this.pagination.to) {
        return [];
      }

      var from = this.pagination.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }

      var to = from + (this.offset * 2);
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }

      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    }
  },
  watch: {
    filtrar: function (val) {
      this.buscar(val)
    },
  },
  mounted() {
    this.listar_facturas()
  },
  methods: {
    async listar_facturas(page) {
      await axios.get(`${this.route}lista-facturas?page=` + page).then(res => {
        this.facturas = res.data.data
        this.pagination = res.data
      })
      console.log(res.data) 
      console.log(this.facturas)
      this.conteo = this.facturas.length
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.listar_facturas(page);
    },
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
.tres-puntos{
  width: 100%;
  height: 39px;
  font-size: 12pt;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
</style>
