import Vue from 'vue'
import VueRouter from 'vue-router';
import Login from './page/Login.vue'
import Signup from './page/Signup.vue'
import Home from './page/Home.vue'
import store from "./store.js";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {requiresAuth: true},
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {guest: true},
        },
        {
            path: '/signup',
            name: 'signup',
            component: Signup,
            meta: {guest: true},
        },

    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        // if (store.getters['auth/isAuthenticated']) {
        if (store.state.token) {
            next();
            return;
        }
        next("/login");
    } else {
        next();
    }
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.guest)) {
        // if (store.getters['auth/isAuthenticated']) {
        if (store.state.token) {
            next("/");
            return;
        }
        next();
    } else {
        next();
    }
});

export default router;
