<template>
  <div>
    <div class="card">      
      <div class="card-body">
        <h5 class="card-title titulo">Facturas</h5>
        <div class="card-body">
          <facturaPorCobrar />
          <br>
          <facturaCobrada />
        </div>
      </div>
    </div>



  </div>
</template>

<script>
import facturaCobrada from './facturas/facturas-cobradas'
import facturaPorCobrar from './facturas/facturas-por-cobrar'
import moment from 'moment'
export default {
  data() {
    return {
    };
  },

  mounted() {
  },
  methods: {
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
.calculadora{

}
</style>
