<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title titulo">Marcar corte</h5>
        <div class="card-body">
          <div class="card mx-3 my-2">
            <div class="card-body justify-contend-center">
              <button class="btn btn-primary" @click="confirmacion">Corte</button>
              <span class="mensaje">¡Recuerde que una vez presione el boton, no hay marcha atras!</span>
            </div>
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
      route: 'api/facturas/',
    };
  },
  methods: {
    confirmacion() {
      this.$confirm('Esta seguro de marcar el corte?', 'Warning', {
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancel',
        type: 'Advertencia'
      }).then(() => {
        this.marcarCorte()
      }).catch(() => {
        this.$notify.error({
          message: 'Se cancelo la marcada del corte',
        });        
      });
    },
    marcarCorte() {
      axios.put(`${this.route}marcar-corte`).then(res => {
        this.$notify({
          message: 'Se ah marcado el corte correctamente',
          type: 'success'
        });
      })
    }
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
</style>
