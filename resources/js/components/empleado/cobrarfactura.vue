<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Cobrar Factura</h5>
        <div class="card-body">
          <button class="btn btn-success boton" data-toggle="modal" data-target="#CobrarFactura" @click="limpiar">Cobrar</button>
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
                  <img v-if="model.tipo_vehiculo == ''" src="img/sinImagen.jpg" alt="..." class="img-thumbnail imagen">
                  <img v-else-if="model.tipo_vehiculo == 0" src="img/car.jpg" alt="..." class="img-thumbnail imagen">
                  <img v-else-if="model.tipo_vehiculo == 1" src="img/motorcicle.png" alt="..." class="img-thumbnail imagen">
                  <div class="mt-3 container border-1">
                    <div class="row">
                      <label for="">Cantidad a pagar</label>
                      <input v-model="calcular.cantidad" type="number" class="form-control" min="0">
                    </div>       
                    <div class="row">
                      <label for="">Pago</label>
                      <input v-model="calcular.pago" type="number" class="form-control" min="0">
                    </div>
                    <button class="btn btn-block btn-success" @click="vueltos">Calcular</button>
                    <hr>
                    <label for="">Vueltos</label>
                    <input v-model="calcular.vueltos" type="number" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Cliente mensual</span>
                    </div>
                    <input type="text" v-model="model.tipo_cliente" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>                    
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Cliente</span>
                    </div>
                    <input type="text" v-model="model.cliente" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>  
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Placa</span>
                    </div>
                    <input type="text" v-model="model.placa" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>         
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">fecha de creado</span>
                    </div>
                    <input type="text" v-model="model.fecha_creacion" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>        
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">hora de creado</span>
                    </div>
                    <input type="text" v-model="model.hora_creacion" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>       
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">creado por</span>
                    </div>
                    <input type="text" v-model="model.creado_por" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>
                  <hr>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">cobrado por</span>
                    </div>
                    <input type="text" v-model="model.usuario_logeado" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Iva</span>
                    </div>
                    <input type="text" v-model="model.iva" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>                  
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Descuento</span>
                    </div>
                    <input type="text" v-model="model.descuento" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Total</span>
                    </div>
                    <input type="text" v-model="model.total" class="form-control" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="facturar">Cobrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment'
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
      route: 'api/facturas/',
      route2: 'api/precios/',
      model: {
        tipo_cliente: '',
        cliente: '',
        tipo_cliente: '',
        tipo_vehiculo: '',
        placa: '',
        fecha_creacion:'',
        hora_creacion:'',
        creado_por:'',
        iva: '',
        descuento: '',
        total: '',
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      },
      precios: {
        id: '',
        mes_carro: '',
        dia_carro: '',
        hora_carro: '',
        minuto_carro: '',
        segundo_carro: '',
        mes_moto: '',
        dia_moto: '',
        hora_moto: '',
        minuto_moto: '',
        segundo_moto: ''
      },
      calcular: {
        pago: '',
        cantidad: '',
        vueltos: ''
      }
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
    limpiar() {
      this.id_factura = '',
      this.model = {
        tipo_cliente: '',
        cliente: '',
        tipo_cliente: '',
        tipo_vehiculo: '',
        placa: '',
        fecha_creacion:'',
        hora_creacion:'',
        creado_por:'',
        iva: '',
        descuento: '',
        total: '',
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      },
      this.calcular = {
        pago: '',
        cantidad: '',
        vueltos: ''
      }
    },
    async listarFacturas() {
      fetch('http://valetparking.test:3000/api/facturas/lista-facturas-por-cobrar')
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
    },
    async filtrar(val) {
      let factura = this.rows.find(o => o.id == val)
      if(factura != undefined){
        await this.consultaFactura(val)
      } else {
        this.model = {
          tipo_cliente: '',
          cliente: '',
          tipo_cliente: '',
          tipo_vehiculo:'',
          placa:'',
          fecha_creacion:'',
          hora_creacion:'',
          cobrado_por: '',
          iva: '',
          descuento: '',
          total: '',
          usuario_logeado: document.getElementsByName('correo_usuario')[0].content
        }
      }
    },
    async consultaFactura(id) {
      await axios.get(`${this.route}${id}/consulta-factura`).then(res => {
        this.model = {
          tipo_cliente: res.data[0].cliente.asociado,
          cliente: res.data[0].cliente.nombre+' '+res.data[0].cliente.apellido,
          tipo_cliente: res.data[0].cliente.asociado,
          tipo_vehiculo: res.data[0].tipo_vehiculo,
          placa: res.data[0].placa,
          creado_por: res.data[0].created_by,
          fecha_creacion: moment(res.data[0].created_at).format('L'),
          hora_creacion: moment(res.data[0].created_at).format('LT'),
          cobrado_por: document.getElementsByName('correo_usuario')[0].content,
          iva: res.data[0].iva.porcentaje,
          descuento: res.data[0].id_descuento == null ? '0' : res.data[0].descuento.porcentaje,
          total: this.calcularPrecio(res.data[0].created_at, res.data[0].tipo_vehiculo, res.data[0].iva.porcentaje, res.data[0].cliente.asociado, res.data[0].id_descuento == null ? '0' : res.data[0].descuento.porcentaje),
          usuario_logeado: document.getElementsByName('correo_usuario')[0].content
        }
      })
    },
    calcularPrecio(fechaCreado, tipoVehiculo, iva, esCliente, descuento) {
      var fecha1 = moment(new Date())
      var fecha2 = moment(fechaCreado) 
      let tiempo_tascurrido = moment.duration(fecha1.diff(fecha2))._data

      if(esCliente == '3'){
        return 0
      }

      if(esCliente == '2'){
        if(tipoVehiculo == 1){
          let precio_ano =  tiempo_tascurrido.years * this.precios.ano_moto
          let precio_mes =  tiempo_tascurrido.months * this.precios.mes_moto
          let precio_dias =  tiempo_tascurrido.days * this.precios.dia_moto
          let precio_horas =  tiempo_tascurrido.hours * this.precios.hora_moto
          let precio_minutos =  tiempo_tascurrido.minutes * this.precios.minuto_moto
          let precio_segundos =  tiempo_tascurrido.seconds * this.precios.segundo_moto
          let total = (((precio_ano + precio_mes + precio_dias)  +  ((precio_ano + precio_mes + precio_dias) * iva) / 100))
          return total.toFixed(0)
        } else {
          let precio_ano =  tiempo_tascurrido.years * this.precios.ano_carro
          let precio_mes =  tiempo_tascurrido.months * this.precios.mes_carro
          let precio_dias =  tiempo_tascurrido.days * this.precios.dia_carro
          let precio_horas =  tiempo_tascurrido.hours * this.precios.hora_carro
          let precio_minutos =  tiempo_tascurrido.minutes * this.precios.minuto_carro
          let precio_segundos =  tiempo_tascurrido.seconds * this.precios.segundo_carro
          let total = (((precio_ano + precio_mes + precio_dias)  +  ((precio_ano + precio_mes + precio_dias) * iva) / 100))
          return total.toFixed(0)
        }
      }
      if(esCliente == '1'){
        if(tipoVehiculo == 1){
        // flata el descuento
        let precio_ano =  tiempo_tascurrido.years * (8640 * this.precios.hora_moto)
        let precio_mes =  tiempo_tascurrido.months * (720 * this.precios.hora_moto)
        let precio_dias =  tiempo_tascurrido.days * (24 * this.precios.hora_moto)
        let precio_horas =  tiempo_tascurrido.hours * this.precios.hora_moto
        let precio_minutos =  tiempo_tascurrido.minutes * this.precios.minuto_moto
        let precio_segundos =  tiempo_tascurrido.seconds * this.precios.segundo_moto
        let total = ((precio_ano + precio_mes + precio_dias + precio_horas + precio_minutos + precio_segundos) + (((precio_ano + precio_mes + precio_dias + precio_horas + precio_minutos + precio_segundos) * iva)/100))
        let total_a_pagar = total-((total*descuento)/100).toFixed(0)
        return total_a_pagar
      } else {
        // flata el descuento
        let precio_ano =  tiempo_tascurrido.years * (8640 * this.precios.hora_carro)
        let precio_mes =  tiempo_tascurrido.months * (720 * this.precios.hora_carro)
        let precio_dias =  tiempo_tascurrido.days * (24 * this.precios.hora_carro)
        let precio_horas =  tiempo_tascurrido.hours * this.precios.hora_carro
        let precio_minutos =  tiempo_tascurrido.minutes * this.precios.minuto_carro
        let precio_segundos =  tiempo_tascurrido.seconds * this.precios.segundo_carro
        let total = ((precio_ano + precio_mes + precio_dias + precio_horas + precio_minutos + precio_segundos) + (((precio_ano + precio_mes + precio_dias + precio_horas + precio_minutos + precio_segundos) * iva)/100))
        let total_a_pagar = total-((total*descuento)/100).toFixed(0)
        return total_a_pagar
      }
    }
  },
  async listar_precios() {
    await axios.get(`${this.route2}lista-precios`).then(res => {
      this.precios = {
        id: res.data.id,
        ano_carro: res.data[0].ano_carro,
        mes_carro: res.data[0].mes_carro,
        dia_carro: res.data[0].dia_carro,
        hora_carro: res.data[0].hora_carro,
        minuto_carro: res.data[0].minuto_carro,
        segundo_carro: res.data[0].segundo_carro,
        ano_moto: res.data[0].ano_moto,
        mes_moto: res.data[0].mes_moto,
        dia_moto: res.data[0].dia_moto,
        hora_moto: res.data[0].hora_moto,
        minuto_moto: res.data[0].minuto_moto,
        segundo_moto: res.data[0].segundo_moto
      }
    })
  },
  async facturar() { 
    await axios.put(`${this.route}${this.id_factura}/actualizar-estado-factura`, this.model)
    this.rows = []
    await this.listarFacturas()
    this.$notify({
      title: 'Success',
      message: 'Se cobro la correctamente',
      type: 'success'
    });
    $('#CobrarFactura').modal('hide')
  },
  vueltos() {
    if(this.calcular.pago != '' && this.calcular.cantidad != ''){
      let operacion = parseFloat(this.calcular.pago) - parseFloat(this.calcular.cantidad)
      if(parseFloat(operacion) >= 0){
        this.calcular.vueltos = operacion
      } else {
        this.$notify.error({
          title: 'Error',
          message: 'Hay un error con los valores',
        });
      }
    } else {
      this.calcular.vueltos = 0
    }
  },
},
watch: {
  id_factura: function (val) {
    this.filtrar(val)
  },
},  
mounted(){
  this.listarFacturas()
  this.listar_precios()
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
.imagen{
  width: 330px;
  height: 250px;
}
</style>
