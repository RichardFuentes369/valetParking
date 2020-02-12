<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Roles</h5>
        <div class="d-flex justify-content-end">
          <el-button type="primary" icon="el-icon-plus" circle data-toggle="modal" data-target="#CrearRol" @click="limpiarModel()"></el-button>
        </div>
        <br>
        <div class="card-body">
          <div class="row mt-xl-n5">
            <div v-for="rol in roles" class="card mx-3 my-2" style="width: 16rem">
              <div class="card-body">
                <el-tooltip class="item" effect="dark" content="Cantidad de usuarios" placement="bottom-end">
                  <span class="card-text cantidad">{{rol.tengo_usuarios.length}}</span>
                </el-tooltip>
                <el-tooltip class="item" effect="dark" content="Eliminar este rol" placement="bottom-end">
                  <el-button type="danger" class="eliminarcard" icon="el-icon-delete" circle @click="eliminarRol(rol.id)" />
                </el-tooltip>
                <h5 class="card-title text-lg-left">
                  <el-tooltip class="item" effect="light" content="Click para editar" placement="top">
                    <input type="text" v-model="rol.nombre" class="border-0 ml-auto alert-link" @change="actualizar_rol(rol)">
                  </el-tooltip>
                </h5>
                <h4 class="card-text text-center text-muted">
                  <el-tooltip class="item" effect="light" content="Click para editar" placement="top">
                    <input type="text" v-model="rol.descripcion" class="border-0 text-muted tres-puntos" @change="actualizar_rol(rol)">
                  </el-tooltip>
                </h4>
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#MostrarUsuarios" @click="mostrarUsuarios(rol.id)">Mostrar</button>
                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#CrearUsuarios" @click="llenarid(rol.id)">Agregar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Crear Roles -->
    <div class="modal fade" id="CrearRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo rol</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="">Nombre</label>
            <el-input placeholder="Please input" v-model="model.nombre" maxlength="50" show-word-limit />
            <label for=""></label>
            <label for="">Descripcion</label>
            <el-input type="textarea" placeholder="Please input" v-model="model.descripcion" maxlength="255" show-word-limit resize="none" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="crear_rol">Crear</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Ver Usuarios -->
    <div class="modal fade bd-example-modal-xl" id="MostrarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Usuarios registrados en este perfil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body scroll-y">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre(s)</th>
                  <th scope="col">Apellido(s)</th>
                  <th scope="col">TD</th>
                  <th scope="col">DNI</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">INICIO CONTRATO</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(usuario, key) in usuarios">
                  <th scope="row">{{key+1}}</th>
                  <td>{{usuario.nombre}}</td>
                  <td>{{usuario.apellido}}</td>
                  <td>{{usuario.td}}</td>
                  <td>{{usuario.dni}}</td>
                  <td>{{usuario.email}}</td>
                  <td>{{usuario.fecha_nacimiento}}</td>
                  <td>
                    <el-button type="danger" icon="el-icon-delete" circle @click="eliminarUsuario(usuario.id)"></el-button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Crear Usuarios -->
    <div class="modal fade" id="CrearUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body scroll-y">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-6">
                  <span>Nombre</span>
                  <el-input placeholder="Nombre(s)" v-model="model2.nombre" maxlength="50" show-word-limit />
                </div>
                <div class="col-sm-6">
                  <span>Apellido</span>
                  <el-input placeholder="Apellido(s)" v-model="model2.apellido" maxlength="50" show-word-limit />
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-6">
                  <span>Tipo de documento</span>
                  <br>
                  <el-select v-model="model2.td" placeholder="Select" class="form-control-file">
                    <el-option v-for="item in options" :key="item.value" :label="item.label" :value="item.value" />
                  </el-select>
                </div>
                <div class="col-sm-6">
                  <span>DNI</span>
                  <el-input placeholder="1-0008869" v-model="model2.dni" maxlength="50" show-word-limit resize="none" />
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-12">
                  <span>Correo</span>
                  <el-input type="email" placeholder="example@correo.com" v-model="model2.email" maxlength="50" show-word-limit resize="none" />
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-6">
                  <label for="">Fecha de nacimiento</label>
                  <el-date-picker v-model="model2.fecha_nacimiento" type="date" placeholder="Fecha nacimiento" />
                  <br>
                  <label for="">Telefono fijo</label>
                  <el-input placeholder="Fijo" v-model="model2.telefono_fijo" maxlength="50" show-word-limit resize="none" />
                  <label for="">Telefono celular</label>
                  <el-input placeholder="Celular" v-model="model2.telefono_celular" maxlength="50" show-word-limit resize="none" />
                </div>
                <div class="col-sm-6" v-show="this.model2.id_rol != 3">
                  <label for="">Inicio Contrato</label>
                  <br>
                  <el-date-picker v-model="model2.inicio_contrato" type="date" placeholder="Inicio contrato" />
                  <br>
                  <label for="">Fin contrato</label>
                  <br>
                  <el-date-picker v-model="model2.fin_contrato" type="date" placeholder="Fin contrato" />
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="crear_usuario">Crear</button>
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
      route: 'api/roles/',
      route2: 'api/usuarios/',
      roles: [],
      usuarios: [],
      model: {
        nombre: '',
        descripcion: '',
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      },
      model2: {
        nombre: '',
        apellido: '',
        td: '',
        dni: '',
        email: '',
        fecha_nacimiento: '',
        telefono_fijo: '',
        telefono_celular: '',
        inicio_contrato: '',
        fin_contrato: '',
        id_rol: '',
      },
      options: [{
        label: 'CC',
        value: 'cc'
      },
      {
        label: 'CE',
        value: 'ce'
      },
      {
        label: 'TI',
        value: 'ti'
      }
      ]
    };
  },
  mounted() {
    this.lista_roles()
  },
  methods: {
    //*Roles
    limpiarModel() {
      this.model = {
        nombre: '',
        descripcion: '',
        usuario_logeado: document.getElementsByName('correo_usuario')[0].content
      }
    },
    lista_roles() {
      axios.get(`${this.route}lista-roles`).then(res => {
        this.roles = res.data
      })
    },
    async crear_rol() {
      await axios.post(`${this.route}crear-rol`, this.model)
      this.$notify({
        title: 'Success',
        message: 'Rol creado exitosamente',
        type: 'success'
      });
      this.lista_roles()
      this.limpiarModel()
      $('#CrearRol').modal('hide')
      this.model = {
        nombre: '',
        descripcion: ''
      }
    },
    async actualizar_rol(rol) {
      this.model = {
        nombre: rol.nombre,
        descripcion: rol.descripcion
      },
      await axios.put(`${this.route}${rol.id}/actualizar-rol`, this.model)
      this.lista_roles()
      this.limpiarModel()
      this.$notify({
        title: 'Success',
        message: 'Se actualizo el rol correctamente',
        type: 'success'
      });
    },
    async eliminarRol(id) {
      await axios.delete(`${this.route}${id}/eliminar-rol`)
      this.lista_roles()
      this.$notify({
        title: 'Success',
        message: 'Se elimino el rol correctamente',
        type: 'success'
      });
    },
    //*Usuarios
    limpiarModel2() {
      this.model2 = {
        nombre: '',
        apellido: '',
        td: '',
        dni: '',
        email: '',
        fecha_nacimiento: '',
        telefono_fijo: '',
        telefono_celular: '',
        inicio_contrato: '',
        fin_contrato: '',
        id_rol: '',
      }
    },
    mostrarUsuarios(id_rol) {
      this.usuarios = this.roles.find(({
        id
      }) => id === id_rol).tengo_usuarios
    },
    llenarid(rol_id) {
      this.limpiarModel2(),
      this.model2.id_rol = rol_id
    },
    async crear_usuario() {
      await axios.post(`${this.route2}crear-usuario`, this.model2)
      this.$notify({
        title: 'Success',
        message: 'Usuario Creado exitosamente',
        type: 'success'
      });
      this.lista_roles()
      $('#CrearUsuarios').modal('hide')
      this.model2 = {
        nombre: '',
        apellido: '',
        td: '',
        dni: '',
        email: '',
        fecha_nacimiento: '',
        telefono_fijo: '',
        telefono_celular: '',
        inicio_contrato: '',
        fin_contrato: '',
        id_rol: ''
      }
    },
    async eliminarUsuario(id) {
      await axios.delete(`${this.route2}${id}/eliminar-usuario`)
      this.usuarios.pop(id)
      this.$notify({
        title: 'Success',
        message: 'Usuario Eliminado exitosamente',
        type: 'success'
      });
      this.lista_roles()
    }
  }
}
</script>

<style lang="css" scoped>
.cantidad {
  color: white;
  position: absolute;
  right: 8%;
  top: 0%;
  font-size: 2em;
  border-bottom-left-radius: 400px 400px;
  border-bottom-right-radius: 400px 400px;
  background-color: #a21414;
  box-shadow: -3px -1px 5px 0px black;
  text-shadow: -2px 1px 20px black;
}
.eliminarcard {
  color: white;
  position: absolute;
  top: -8%;
  right: -5%;
  padding: 2%;
}
.scroll-y{
  height: 20rem;
  width: 100%;
  overflow-y: auto;
}
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