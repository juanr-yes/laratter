<template>
  <div class="row">
    <div class="col text-center">
      <div class="row">
        <div class="col">
          <a href="#" v-on:click="load">Ver respuestas</a>
        </div>
      </div>
      <div class="row" v-for="response in responses">
        <div class="col text-center">
          <div class="card">
            <div class="card-header">
              {{ response.user.username }}
            </div>
            <div class="card-block">
              {{ response.message }}
            </div>
            <div class="card-footer text-muted">
               {{ response.created_at }}
            </div>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['message'],
    data() {
      return {
        responses: []
      }
    },
    methods: {
      load() {
        axios.get('/api/messages/' + this.message + '/responses').then(res => {
          this.responses = res.data
        })
      }
    }
  }
</script>
