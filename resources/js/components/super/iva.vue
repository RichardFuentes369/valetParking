<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Iva</h5>
            <p class="text-center">falta editar y eliminar a los roles</p>
            <div class="d-flex justify-content-end">
                <el-button type="primary" icon="el-icon-plus" circle data-toggle="modal" data-target="#CrearIva"></el-button>
            </div>
            <div class="card-body">
                <div class="row mt-xl-n5">
                    <div v-for="iva in iva" class="card mx-3" style="width: 18rem">
                        <div class="card-body">
                            <h4 class="card-text text-center text-muted">{{iva.anho}}</h4>
                            <p class="text-center">{{iva.porcentaje}}%</p>
                            <p class="text-center">{{iva.created_at | fecha}}</p>
                            <el-tooltip class="item" effect="dark" content="Editar IVA" placement="bottom-end">
                                <el-button type="warning" class="editar" icon="el-icon-edit" circle />
                            </el-tooltip>
                            <el-tooltip class="item" effect="dark" content="Eliminar IVA" placement="bottom-end">
                                <el-button type="danger" class="eliminar" icon="el-icon-delete" circle @click="eliminarIva(iva.id)" />
                            </el-tooltip>
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
                porcentaje: ''
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
        lista_iva() {
            axios.get(`${this.route}listar-iva`).then(res => {
                this.iva = res.data
            })
        },
        async crear_iva() {
            await axios.post(`${this.route}crear-iva`, this.model)
            this.$notify({
                title: 'Success',
                message: 'IVA creado exitosamente',
                type: 'success'
            });
            this.lista_iva()
            $('#CrearIva').modal('hide')
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
}
</script>

<style lang="css" scoped>
.editar {
  color: white;
  position: absolute;
  top: 15%;
  right: 4%;
}
.eliminar {
  color: white;
  position: absolute;
  top: 44%;
  right: 4%;
}
</style>
