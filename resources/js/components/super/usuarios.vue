<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Usuarios</h5>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      <th scope="col">Email</th>
                      <th scope="col">Fecha nacimiento</th>
                      <th scope="col">Rol</th>
                      <th scope="col">created_at</th>
                      <th scope="col">deleted_at</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user, index) in usuarios">
                      <th scope="row">{{user.id}}</th>
                      <td>{{user.nombre}}</td>
                      <td>{{user.apellido}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.fecha_nacimiento}}</td>
                      <td>{{user.rol.nombre}}</td>
                      <td>{{user.created_at | fecha}}</td>
                      <td>{{user.deleted_at | fecha}}</td>
                    </tr>
                  </tbody>
                </table>
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
            route: 'api/usuarios/',
            usuarios: []
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
        this.lista_usuarios()
    },
    methods: {
        lista_usuarios() {
            axios.get(`${this.route}lista-usuarios`).then(res => {
                this.usuarios = res.data
            })
        }
    }
}
</script>

<style lang="css" scoped>
</style>
