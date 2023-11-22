import Vue from 'vue';
import Vuex from 'vuex';
import {getItem, removeItem, setItem} from "./utils/localStorageUtil.js";
import {post} from "./utils/fetchAPI.js";
import {successToast} from "./utils/swalUtil.js";
import router from "./routes.js";


Vue.use(Vuex);
export default new Vuex.Store({
    strict: true,
    state: {
        user: getItem('user') || null,
        token: getItem('token') || null,
    },
    mutations: {
        SET_USER(state, data) {
            state.authUser = data;
            data === null ? removeItem('user') : setItem('user', data)
        },
        SET_TOKEN(state, data) {
            state.token = data;
            data === null ? removeItem('token') : setItem('token', data)
        },
    },
    actions: {
        async logout({commit}){
            try {
                await post('/logout')
                    .then((res) => {
                        commit('SET_USER', null)
                        commit('SET_TOKEN', null)
                        successToast(res.data.message)
                        router.push({ name: 'login' })
                    })
            } catch (error) {
                // console.log(error.response)
            }
        },
    }
});
