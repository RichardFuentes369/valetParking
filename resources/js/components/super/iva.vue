<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Iva</h5>
        <marquee class="marq" direction="left">Recuerde que siempre debe haber un registro de iva, para el uso del sistema</marquee>
        <div class="d-flex justify-content-end">
          <el-button type="primary" icon="el-icon-plus" circle data-toggle="modal" data-target="#CrearIva" @click="limpiar()"></el-button>
        </div>
        <div class="card-body">
          <div class="row mt-xl-n5">
            <div v-for="iva in iva" class="card mx-3 my-2" style="width: 16rem">
              <div class="card-header">
                <h4 class="card-text card-title text-center">{{iva.anho}}</h4>
              </div>
              <div class="card-body">
                <el-tooltip class="item" effect="light" content="Click para editar" placement="top">
                  <div class="input-group mb-3">
                    <input type="text" v-model="iva.porcentaje" class="ml-auto alert-link text-center form-control" @change="actualizar_iva(iva)">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                  </div>
                </el-tooltip>
                <el-tooltip class="item" effect="dark" content="Eliminar IVA" placement="bottom-end">
                  <el-button type="danger" class="eliminar" icon="el-icon-delete" circle @click="eliminarIva(iva.id)" />
                </el-tooltip>
              </div>
              <div class="card-footer">
                <p class="text-center">{{iva.created_at | fecha}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="CrearIva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo iva</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="">Año</label>
            <el-input v-model="model.anho" placeholder="Ingrese el año" maxlength="50" show-word-limit />
            <label for=""></label>
            <label for="">Descripcion</label>
            <el-input type="textarea" v-model="model.descripcion" placeholder="Añade una descripción" maxlength="255" show-word-limit resize="none" />
            <div class="block my-3">
              <span class="demonstration">Porcentaje</span>
              <el-slider v-model="model.porcentaje" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="crear_iva">Crear</button>
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
      route: 'api/impuesto/',
      iva: [],
      model: {
        anho: '',
        descripcion: '',
        porcentaje: '',
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      },
    };
  },
  filters: {
    fecha: function(value) {
      if (!value) return 'no tiene fecha'
        value = moment(value).format('MMM Do YYYY');
      return value
    }
  },
  mounted() {
    this.lista_iva()
  },
  methods: {
    limpiar(){
      this.model = {
        anho: '',
        descripcion: '',
        porcentaje: 0,
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      }
    },
    lista_iva() {
      axios.get(`${this.route}listar-iva`).then(res => {
        this.iva = res.data
      })
    },
    async crear_iva() {
      if(this.model.anho != '' && this.model.porcentaje != ''){
        await axios.post(`${this.route}crear-iva`, this.model)
        this.$notify({
          title: 'Success',
          message: 'IVA creado exitosamente',
          type: 'success'
        });
        this.lista_iva()
        this.limpiar()
        $('#CrearIva').modal('hide')
      } else {
        this.$notify.error({
          message: 'Algunos campos no pueden ir vacios',
        });
      }
    },
    async actualizar_iva(iva) {
      this.model = {
        porcentaje: iva.porcentaje
      }
      if(this.model.porcentaje != ''){
        await axios.put(`${this.route}${iva.id}/actualizar-iva`, this.model)
        this.lista_iva()
        this.limpiar()
        this.$notify({
          title: 'Success',
          message: 'Se actualizo el IVA correctamente',
          type: 'success'
        });        
      } else { 
        this.lista_iva()
        this.$notify.error({
          message: 'Algunos campos no pueden ir vacios',
        });  
      }
    },
    async eliminarIva(id) {
      await axios.delete(`${this.route}${id}/eliminar-iva`)
      this.lista_iva()
      this.$notify({
        title: 'Success',
        message: 'Se elimino el IVA correctamente',
        type: 'success'
      });
    }
  }
};
</script>

<style lang="css" scoped>
.eliminar {
  color: white;
  position: absolute;
  top: -8%;
  right: -5%;
  padding: 2%;
}
.titulo{
  color: white;
  padding: 1rem;
  border-left: 6px solid blue;
  background-color: lightgrey;
  font-family: cursive, sans-serif;
}
.marq{
  font-size: 30px;
  font-weight: 800;
  color: #8ebf42;
  font-family: sans-serif;
}
</style>
