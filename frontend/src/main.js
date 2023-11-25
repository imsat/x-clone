import './style.scss'
import Vue from 'vue';

import infiniteScroll from 'vue-infinite-scroll'
import 'bootstrap'
import router from './routes';
import store from "./store.js";
import './utils/mixin.js'

import App from './App.vue';

import Validation from './components/Validation.vue'

Vue.component('Validation', Validation)
Vue.use(infiniteScroll)

new Vue({
    render: (h) => h(App),
    router,
    store
}).$mount('#app');

