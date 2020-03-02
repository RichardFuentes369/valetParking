<template>
  <div>
    <button class="desplegar estiloBoton btn-success">
      <i class="fas fa-calculator"></i>
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
    };
  },
  filters: {
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
.estiloBoton{
  color: white;
  border-radius: 53%;
}
.desplegar{
  margin-left: 98%;
}
</style>
