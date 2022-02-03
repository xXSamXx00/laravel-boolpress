/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');

// Step 0 installa vue-router
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
// Step 1 Definire i componenti per le rotte
const Home = Vue.component('Home', require('./pages/Home.vue').default);
const About = Vue.component('About', require('./pages/About.vue').default);
const Contacts = Vue.component('Contacts', require('./pages/Contacts.vue').default);
const Posts = Vue.component('Posts', require('./pages/Posts.vue').default);
const PostPage = Vue.component('PostPage', require('./pages/PostPage.vue').default);
// Step 2 Definire le rotte del router
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/contacts',
        name: 'contacts',
        component: Contacts
    },
    {
        path: '/posts',
        name: 'posts',
        component: Posts
    },
    {
        path: '/posts/:id',
        name: 'post',
        component: PostPage
    }
];
// Step 3  Create the router instance and pass the `routes` option
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('App', require('./App.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router, //Step 4 aggiungere all'istanza vue il router
    el: '#app',
    data: {
        posts: null
    },
    mounted() {
        Axios.get('/api/posts').then(r => {
            console.log(r);
            this.posts = r.data.data;
        }).catch(e => {
            console.error('Sorry', + e);
        })
    }
});
