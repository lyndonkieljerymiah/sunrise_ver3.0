import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
    {path: "/login", component: require("../views/auth/Login.vue")},
    {path: "/register", component: require("../views/auth/Register.vue")},
    {path: "/", component: require("../views/dashboard/Dashboard.vue")}
];

const router = new VueRouter({routes});

export default router;


