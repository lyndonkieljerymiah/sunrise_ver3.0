
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import App from "./App.vue";
import {store} from "./store/index";
import router from "./router/router";
/**
 * Issue a passport client component
 */


const app = new Vue({
    el: '#app',
    render: h => h(App),
    store,
    router
});
