<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Empleados</h5>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Empleado</th>
                <th scope="col">Facturas</th>
                <th scope="col">Descuentos</th>
                <th scope="col">Total descuentos</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Robicunsio manjarreti</th>
                <td>150</td>
                <td>5</td>
                <td>52000</td>
                <td>1532000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

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
</style>
