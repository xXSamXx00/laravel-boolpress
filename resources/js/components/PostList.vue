<template>
    <div>
        <div class="row">
            <div class="col-3" v-for="post in posts" :key="post.id">
                <router-link :to="'/posts/' + post.id">
                    <div class="content">
                        <img class="img-fluid" :src="post.image" :alt="post.title">
                        <h3>{{ post.title }}</h3>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from 'axios'
export default {
    data() {
        return {
            loading: true,
            posts: null
        }
    },
    mounted() {
        Axios.get('api/posts').then(r => {
            this.posts = r.data.data;
            this.loading = false;
        })
    }

}
</script>

<style>

</style>