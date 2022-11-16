import Login from '../views/Login.vue';
import Home from '../views/Home.vue';
import Register from '../views/Register.vue';
import Auth from '../services/middleware.js';
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/spa/login',
        name: 'login',
        component: Login
    },

    {
        path: '/spa/home',
        name: 'home',
        component: Home,
        beforeEnter: Auth.auth
    },

    {
        path: '/spa/register',
        name: 'register',
        component: Register,
    },
];

const router = new createRouter({
    history: createWebHistory(),
    routes
});

export default router;