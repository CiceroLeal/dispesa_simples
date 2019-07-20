/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue';
import VueMask from 'v-mask';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';


window.Vue.use(VueMask);
window.Vue.use(VueRouter);
window.Vue.use(BootstrapVue);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
import Index from './components/Index';
import CadastroConta from './components/contas/Cadastro';


const routes = [
    {
        path: '/',
        component: Index,
        props: true
    },
    {
        path: '/conta/criar',
        component: CadastroConta,
    }
]

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({ routes, mode: 'history' });

const app = new Vue({
    router
}).$mount('#appVue');
