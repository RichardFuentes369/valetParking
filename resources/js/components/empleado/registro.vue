<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Registrar Cliente</h5>  
        <div class="card mt-3 ml-4 mr-4">
          <div class="card-header">
            Usuarios Cliente
          </div>
          <div class="card-body">
            Hay {{conteo}} cliente(s) registrado(s) en el sistema
          </div>
        </div>
        <div class="col-sm-12 mt-3">
          <div class="row">
            <div class="col-sm-6">
              <button class="btn btn-block btn-primary" circle data-toggle="modal" data-target="#CrearUsuario" @click="limpiar">Crear Cliente</button>
            </div>    
            <div class="col-sm-6">
              <button class="btn btn-block btn-success" circle data-toggle="modal" data-target="#VerUsuario">Ver Clientes</button>
            </div>     
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Crear Cliente -->
    <div class="modal fade" id="CrearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-sm-12">
              <label for="">Asociado</label> <br>
              <el-select v-model="model.asociado" placeholder="Select">
                <el-option
                v-for="item in options2"
                :key="item.value"
                :label="item.label"
                :value="item.value" />
              </el-select>
            </div>
            <div class="col-sm-12 row">
              <div class="col-sm-6">
                <label for="">Nombre</label>
                <el-input v-model="model.nombre" placeholder="Please input" maxlength="50" show-word-limit />
              </div>
              <div class="col-sm-6">
                <label for="">Apellido</label>
                <el-input v-model="model.apellido" placeholder="Please input" maxlength="50" show-word-limit />
              </div>
            </div>
            <div class="col-sm-12 row">
              <div class="col-sm-6">
                <label for="">TD</label>
                <el-select v-model="model.td" placeholder="Select">
                  <el-option
                  v-for="item in options"
                  :key="item.value"
                  :label="item.label"
                  :value="item.value" />
                </el-select>
              </div>
              <div class="col-sm-6">
                <label for="">DNI</label>
                <el-input v-model="model.dni" placeholder="Please input" maxlength="50" show-word-limit />
              </div>
            </div>
            <div class="col-sm-12">
              <label for="">Fecha Nacimiento</label> <br>
              <el-date-picker
              v-model="model.fecha_nacimiento"
              type="date"
              class="ajuste"
              placeholder="Seleccione" />
            </div>
            <div class="col-sm-12 row">
              <div class="col-sm-6">
                <label for="">Fijo</label>
                <el-input v-model="model.fijo" placeholder="Please input" maxlength="50" show-word-limit />
              </div>
              <div class="col-sm-6">
                <label for="">Celular</label>
                <el-input v-model="model.celular" placeholder="Please input" maxlength="50" show-word-limit />
              </div>
            </div>   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="crear_cliente">Crear</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Ver Clientes -->
    <div class="modal fade bd-example-modal-xl" id="VerUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body scroll-y">
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Apellido</th>
                    <th scope="col" class="text-center">Asociado</th>
                    <th scope="col" class="text-center">Td</th>
                    <th scope="col" class="text-center">DNI</th>
                    <th scope="col" class="text-center">Fecha Nacimiento</th>
                    <th scope="col" class="text-center">Fijo</th>
                    <th scope="col" class="text-center">Celular</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(cliente, index) in clientes">
                    <td scope="row">{{cliente.id}}</td>
                    <td>{{cliente.nombre}}</td>
                    <td>{{cliente.apellido}}</td>
                    <td class="text-center">{{cliente.asociado}}</td>
                    <td>{{cliente.td}}</td>
                    <td>{{cliente.dni}}</td>
                    <td>{{cliente.fecha_nacimiento}}</td>
                    <td>{{cliente.fijo}}</td>
                    <td>{{cliente.celular}}</td>  
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
      route: 'api/clientes/',
      model: {
        nombre: '',
        apellido: '',
        td: '',
        dni: '',
        fecha_nacimiento: '',
        fijo: '',
        celular: '',
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      },
      clientes: [],
      conteo: '',
      options: [
      {
        label: 'CC',
        value: '1'
      },
      {
        label: 'TI',
        value: '2'
      },
      {
        label: 'CE',
        value: '3'
      }
      ],
      options2: [
      {
        label: 'No Cliente',
        value: '1'
      },
      {
        label: 'Es Cliente',
        value: '2'
      },
      {
        label: 'Es Empleado',
        value: '3'
      }
      ]
    };
  },
  mounted() {
    this.lista_clientes()
  },
  methods: {
    limpiar(){
      this.model = {
        asociado: '',
        nombre: '',
        apellido: '',
        td: '',
        dni: '',
        fecha_nacimiento: '',
        fijo: '',
        celular: '',
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      }
    },
    async lista_clientes() {
      await axios.get(`${this.route}lista-clientes`).then(res => {
        this.clientes = res.data
      })
      this.conteo = this.clientes.length
    },
    async crear_cliente() {
      await axios.post(`${this.route}crear-cliente`, this.model)
      this.$notify({
        title: 'Success',
        message: 'Cliente creado exitosamente',
        type: 'success'
      });
      this.limpiar()
      this.lista_clientes()
      $('#CrearUsuario').modal('hide')
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
.ajuste{
  padding-right: 30px;
  border-right-width: 1px;
  width: 100%;
}
.scroll-y{
  height: 20rem;
  width: 100%;
  overflow-y: auto;
}
</style>
