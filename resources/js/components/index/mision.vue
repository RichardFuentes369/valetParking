<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Misión</h5>
        <div class="card-body">
          <h5>{{model.vision}}</h5>
        </div>
        <h5 class="card-title text-center">Visión</h5>
        <div class="card-body">
          <h5>{{model.vision}}</h5>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      route: 'api/index/',
      model: {
        mision: '',
        vision: ''
      },
    };
  },
  mounted(){
    this.mision()
  },
  methods: {
    mision(){
      axios.get(`${this.route}informacion`).then(res => {
        this.model.mision = res.data.mision,
        this.model.vision = res.data.vision
      })
    }
  }
}
</script>

<style lang="css" scoped>
</style>
