<template>
  <div class="card">
      <img :src="post.image" :alt="post.title">
      <div class="card-body">
          <h3>{{ post.title }}</h3>
      </div>
  </div>
</template>

<script>
import Axios from 'axios'
export default {
    data() {
        return {
            post: null
        }
    },
    mounted() {
        Axios.get('/api/posts/' + this.$route.params.id).then(r => {
            console.log(r);
            this.post = r.data.data
        })
    }
}
</script>

<style>

</style>