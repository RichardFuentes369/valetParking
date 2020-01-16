<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Roles</h5>
            <div class="d-flex justify-content-end">
                <el-button type="primary" icon="el-icon-plus" circle data-toggle="modal" data-target="#CrearRol"></el-button>
            </div>
            <div class="card-body">
                <div class="row mt-xl-n5">
                    <div v-for="rol in roles" class="card mx-3" style="width: 18rem">
                        <div class="card-body">
                            <el-tooltip class="item" effect="dark" content="Cantidad de usuarios" placement="bottom-end">
                                <span class="card-text cantidad">{{rol.tengo_usuarios.length}}</span>
                            </el-tooltip>
                            <h5 class="card-title text-lg-left">{{rol.nombre}}</h5>
                            <h4 class="card-text text-center text-muted">{{rol.descripcion}}</h4>
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
    <div class="modal fade" id="MostrarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                            <div class="col-sm-6">
                                <label for="">Inicio Contrato</label>
                                <br>
                                <el-date-picker v-model="model2.inicio_contrato" type="date" placeholder="Inicio contrato" />
                                <br>
                                <label for="">Fin contrato</label>
                                <br>
                                <el-date-picker v-model="model2.fin_contrato" type="date" placeholder="Fint contrato" />
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
                descripcion: ''
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
        lista_roles() {
            axios.get(`${this.route}lista-roles`).then(res => {
                this.roles = res.data
            })
        },
        async crear_rol() {
            await axios.post(`${this.route}crear-rol`, this.model)
            this.lista_roles()
            $('#CrearRol').modal('hide')
        },
        mostrarUsuarios(id_rol) {
            this.usuarios = this.roles.find(({
                id
            }) => id === id_rol).tengo_usuarios
        },
        llenarid(rol_id) {
            this.model2.id_rol = rol_id
        },
        async crear_usuario() {
            await axios.post(`${this.route2}crear-usuario`, this.model2)
            this.lista_roles()
            $('#CrearUsuarios').modal('hide')
            this.model2 = []
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
.scroll-y{
  height: 300px;
  width: 100%;
  overflow-y: auto;
}
</style>
