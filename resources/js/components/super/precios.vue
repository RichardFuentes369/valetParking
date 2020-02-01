<template>
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">Precios</h5>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="d-flex justify-content-center">
                        <label for="">MOTO</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <el-button type="primary" icon="el-icon-plus" circle data-toggle="modal" data-target="#CrearPrecioMoto"></el-button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex justify-content-center">
                        <label for="">CARRO</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <el-button type="primary" icon="el-icon-plus" circle data-toggle="modal" data-target="#CrearPrecioCarro"></el-button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card-body">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <table class="table" style="background:#8ba987 url('img/motorcicle.jpg') no-repeat center center;">
                            <tr>
                                <td>
                                    <label for="">
                                        <h5>Cuarto Moto</h5>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <h5>$1500</h5>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">
                                        <h5>Media Moto</h5>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <h5>$1500</h5>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">
                                        <h5>Hora Moto</h5>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <h5>$1500</h5>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">
                                        <h5>Semana Moto</h5>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <h5>$1500</h5>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <table class="table" style="background:#8ba987 url('img/car.jpg') no-repeat center center;">
                            <tr>
                                <td>
                                    <label for="">
                                        <h5>Cuarto carro</h5>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <h5>$1500</h5>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">
                                        <h5>Media carro</h5>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <h5>$1500</h5>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">
                                        <h5>Hora carro</h5>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <h5>$1500</h5>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">
                                        <h5>Semana carro</h5>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <h5>$1500</h5>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Crear Precio -->
    <div class="modal fade" id="CrearPrecioMoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="exampleModalLabel">Crear Precios MOTO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">Cuarto de Moto</label>
                    <el-input placeholder="Please input" maxlength="50" show-word-limit />
                    <label for=""></label>
                    <label for="">Media de Moto</label>
                    <el-input type="textarea" placeholder="Please input" maxlength="255" show-word-limit resize="none" />
                    <label for="">Hora de Moto</label>
                    <el-input placeholder="Please input" maxlength="50" show-word-limit />
                    <label for=""></label>
                    <label for="">Semana de Moto</label>
                    <el-input type="textarea" placeholder="Please input" maxlength="255" show-word-limit resize="none" />
                    <label for="">Mes de Moto</label>
                    <el-input placeholder="Please input" maxlength="50" show-word-limit />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Crear Precio -->
    <div class="modal fade" id="CrearPrecioCarro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="exampleModalLabel">Crear Precios CARRO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">Cuarto de Carro</label>
                    <el-input placeholder="Please input" maxlength="50" show-word-limit />
                    <label for=""></label>
                    <label for="">Media de Carro</label>
                    <el-input type="textarea" placeholder="Please input" maxlength="255" show-word-limit resize="none" />
                    <label for="">Hora de Carro</label>
                    <el-input placeholder="Please input" maxlength="50" show-word-limit />
                    <label for=""></label>
                    <label for="">Semana de Carro</label>
                    <el-input type="textarea" placeholder="Please input" maxlength="255" show-word-limit resize="none" />
                    <label for="">Mes de Carro</label>
                    <el-input placeholder="Please input" maxlength="50" show-word-limit />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    // data(){
    //   return {
    //     route: 'api/index/',
    //     model: {
    //       name: '',
    //       password: ''
    //     },
    //   };
    // },
    // methods: {
    //   ingresar(){
    //     axios.post(`${this.route}mision`, this.model)
    //   }
    // }
}
</script>

<style lang="css" scoped>
</style>
