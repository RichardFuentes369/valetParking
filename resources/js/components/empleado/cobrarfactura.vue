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
    <div class="modal fade bd-example-modal-xl" id="CobrarFactura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cobrar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input class="form-control text-center" v-model="id_factura" type="text" placeholder="ID de la factura">
            <div class="col-sm-12 my-2">
              <div class="row">
                <div class="col-sm-4">
                  <img src="img/sinImagen.jpg" alt="..." class="img-thumbnail">
                </div>
                <div class="col-sm-8">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Placa</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>         
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">fecha de creado</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>        
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">hora de creado</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>       
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">creado por</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <hr>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">cobrado por</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Iva</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Descuento</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Total</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
              </div>
            </div>
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
      rows: [],
      id_factura: '',
      model: {
        tipo_vehiculo: '',
        placa: '',
        fecha_creacion:'',
        hora_creacion:'',
        creado_por:'',
        cobrado_por: '',
        iva: '',
        descuento: '',
        total: ''
      },
      usuario_logeado: document.getElementsByName('correo_usuario')[0].content
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
    },
    filtrar(val) {
      let factura = this.rows.find(o => o.id === val)
      if(factura != undefined){
        console.log(factura)
      } else {
        console.log(factura)
      }
    },
  },
  watch: {
    id_factura: function (val) {
      this.filtrar(val)
    },
  },
  mounted(){
    fetch('http://valetparking.test:3000/api/facturas/lista-facturas')
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
