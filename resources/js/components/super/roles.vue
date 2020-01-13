<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Roles</h5>
            <div class="d-flex justify-content-end">
                <el-button type="primary" icon="el-icon-plus" circle data-toggle="modal" data-target="#CrearRol"></el-button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">created_at</th>
                            <th scope="col">deleted_at</th>
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

    <!-- Modal -->
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
                  <el-input
                    type="textarea"
                    placeholder="Please input"
                    v-model="model.descripcion"
                    maxlength="255"
                    show-word-limit
                    resize="none"
                  />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" @click="crear_rol">Crear</button>
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
            route: 'api/roles/',
            roles: [],
            model: {
              nombre: '',
              descripcion: ''
            }
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
        }
    }
}
</script>

<style lang="css" scoped>
.radius{
  border-radius: 50px
}
</style>
