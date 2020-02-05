<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Descuentos</h5>
            <div class="d-flex justify-content-end">
                <el-button class="alineacion" type="primary" icon="el-icon-plus" circle data-toggle="modal" data-target="#CrearDescuento" @click="limpiar()"></el-button>
            </div>
            <br>
            <div class="card-body">
                <div class="row mt-xl-n5">
                    <div v-for="descuento in descuentos" class="card mx-3" style="width: 18rem">
                        <div class="card-body">
                            <h5 class="card-title text-lg-left">
                                <el-tooltip class="item" effect="light" content="Click para editar" placement="top">
                                    <input type="text" v-model="descuento.nombre" class="border-0 ml-auto alert-link" @change="actualizar_descuento(descuento)">
                                </el-tooltip>
                            </h5>
                            <h4 class="card-text text-center text-muted">
                                <el-tooltip class="item" effect="light" content="Click para editar" placement="top">
                                    <input type="text" v-model="descuento.descripcion" class="border-0 text-muted" @change="actualizar_descuento(descuento)">
                                </el-tooltip>
                            </h4>
                            <el-tooltip class="item" effect="light" content="Click para editar" placement="top">
                                <div class="input-group mb-3">
                                    <input type="text" v-model="descuento.porcentaje" class="ml-auto alert-link text-center form-control" @change="actualizar_descuento(descuento)">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                </div>
                            </el-tooltip>
                            <p class="text-center">{{descuento.created_at | fecha}}</p>
                            <el-tooltip class="item" effect="dark" content="Eliminar Desceunto" placement="bottom-end">
                                <el-button type="danger" class="eliminar" icon="el-icon-delete" circle @click="eliminarDescuento(descuento.id)" />
                            </el-tooltip>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Crear Roles -->
    <div class="modal fade" id="CrearDescuento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear nuevo descuento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">Nombre</label>
                    <el-input v-model="model.nombre" placeholder="Please input" maxlength="50" show-word-limit />
                    <label for="">Descripcion</label>
                    <el-input v-model="model.descripcion" type="textarea" placeholder="Please input" maxlength="255" show-word-limit resize="none" />
                    <div class="block my-3">
                        <span class="demonstration">Porcentaje</span>
                        <el-slider v-model="model.porcentaje" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" @click="crear_descuento">Crear</button>
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
            route: 'api/descuentos/',
            descuentos: [],
            model: {
                nombre: '',
                descripcion: '',
                porcentaje: ''
            },
        };
    },
    mounted() {
        this.lista_descuento()
    },
    methods: {
        limpiar() {
            this.model = {
                nombre: '',
                descripcion: '',
                porcentaje: 0,
            }
        },
        lista_descuento() {
            axios.get(`${this.route}lista-descuentos`).then(res => {
                this.descuentos = res.data
            })
        },
        async crear_descuento() {
            await axios.post(`${this.route}crear-descuento`, this.model)
            this.$notify({
                title: 'Success',
                message: 'Descuento creado exitosamente',
                type: 'success'
            });
            this.lista_descuento()
            this.limpiar()
            $('#CrearDescuento').modal('hide')
            this.model = {
                nombre: '',
                descripcion: '',
                porcentaje: ''
            }
        },
        async actualizar_descuento(descuento) {
            this.model = {
                    nombre: descuento.nombre,
                    descripcion: descuento.descripcion,
                    porcentaje: descuento.porcentaje
                },
                await axios.put(`${this.route}${descuento.id}/actualizar-descuento`, this.model)
            this.lista_descuento()
            this.$notify({
                title: 'Success',
                message: 'Se actualizo el descuento correctamente',
                type: 'success'
            });
        },
        async eliminarDescuento(id) {
            await axios.delete(`${this.route}${id}/eliminar-descuento`)
            this.lista_descuento()
            this.$notify({
                title: 'Success',
                message: 'Se elimino el descuento correctamente',
                type: 'success'
            });
        },
    },
    filters: {
        fecha: function(value) {
            if (!value) return 'no tiene fecha'
            value = moment(value).format('MMM Do YYYY');
            return value
        }
    },
}
</script>

<style lang="css" scoped>
.alineacion{
  margin-top: 0%;
  margin-left: 90%;
}
.eliminar {
  color: white;
  position: absolute;
  top: -14%;
  right: 93%;
}
</style>
