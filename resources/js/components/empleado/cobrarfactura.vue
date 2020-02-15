<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Cobrar Factura</h5>
        <div class="card-body">
          <button class="btn btn-success boton" data-toggle="modal" data-target="#CobrarFactura">Cobrar</button>
          <h3 class="text-center">Facturas</h3>
          <mdb-container>
            <mdb-datatable
            :data="data"
            striped
            bordered
            arrows
            :display="3"
            />
          </mdb-container>
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
            <input class="form-control" type="text" placeholder="ingrese el id">
            <table class="table">
              <tr>
                <td>Creado por</td>
                <td>Javier Ricardo Baron</td>
              </tr>
              <tr>
                <td>Fecha de creado</td>
                <td>2018/06/01</td>
              </tr>
              <tr>
                <td>PLACA</td>
                <td>ZGO213</td>
              </tr>
              <tr>
                <td>Hora de creado</td>
                <td>2018/06/01</td>
              </tr>
              <tr>
                <td>Descuento aplicado</td>
                <td>3%</td>
              </tr>
              <tr>
                <td>Fecha de fin</td>
                <td>2018/06/01</td>
              </tr>
              <tr>
                <td>Hora de fin</td>
                <td>2018/06/01</td>
              </tr>
              <tr>
                <td>IVA</td>
                <td>16%</td>
              </tr>
              <tr>
                <td>TOTAL A PAGAR</td>
                <td>2500</td>
              </tr>
              <tr>
                <td>FINALIZADO por</td>
                <td>Javier Ricardo Baron</td>
              </tr>
              <tr>
                <td>Fecha de finalizado</td>
                <td>2018/06/01</td>
              </tr>
              <tr>
                <td>Hora de finalizado</td>
                <td>2018/06/01</td>
              </tr>
            </table>
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
import { mdbDatatable, mdbContainer } from 'mdbvue';
export default {
  components: {
    mdbDatatable,
    mdbContainer
  },
  data() {
    return {
      columns: [],
      rows: []
    };
  },
  computed: {
    data() {
      return {
        columns: this.columns,
        rows: this.rows
      };
    },
  },
  methods: {
    filterData(dataArr, keys) {
      let data = dataArr.map(entry => {
        let filteredEntry = {};
        keys.forEach(key => {
          if (key in entry) {
            filteredEntry[key] = entry[key];
          }
        });
        return filteredEntry;
      });
      return data;
    }
  },
  mounted(){
    fetch('http://valetparking.test/api/facturas/lista-facturas')
    .then(res => res.json())
    .then(json => {
      let keys = ["id", "placa", "tipo_vehiculo", "estado"];
      let entries = this.filterData(json, keys);
          //columns
          this.columns = keys.map(key => {
            return {
              label: key.toUpperCase(),
              field: key,
              sort: 'asc'
            };
          });
          //rows
          entries.map(entry => this.rows.push(entry));
        })
    .catch(err => console.log(err));
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
.boton{
  margin-left: 84%;
  -moz-border-radius: 200px 200px 200px 13px;
  -webkit-border-radius: 200px 1px 200px 13px;
  border: 0px solid #000000;
}
</style>
