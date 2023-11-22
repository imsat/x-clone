<template>
    <div class="form-signin w-100 m-auto">
        <h2 class="h3 mb-3 fw-normal">Sign in to Y</h2>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" v-model="loginForm.email" placeholder="Email" autocomplete="off">
            <label for="floatingInput">Email address</label>
            <Validation :error-text="getError('email')" />
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" v-model="loginForm.password"
                   placeholder="Password" autocomplete="off">
            <label for="floatingPassword">Password</label>
            <Validation :error-text="getError('password')" />
        </div>
        <button type="button" class="btn btn-primary w-100 py-2 my-3" @click.prevent="signIn">Sign in</button>

        <p class="my-5 text-center">New member?
            <router-link to="/signup">Sign up</router-link>
        </p>
    </div>
</template>

<script>
import {post} from "../utils/fetchAPI.js";
import {mapMutations} from "vuex";

export default {
    name: "Login",
    data() {
        return {
            loginForm: {
                email: '',
                password: '',
            },
            errors: [],
        }
    },
    methods: {
        ...mapMutations([
            'SET_USER',
            'SET_TOKEN',
        ]),
        async signIn() {
            await post('login', this.loginForm).then(res => {
                const {token, user} = res?.data?.data
                this.SET_USER(user)
                this.SET_TOKEN(token)
                this.loginForm = {}
                this.$router.push('/')
            }).catch(errors => {
                console.log(errors)
                this.setError(errors?.response?.data?.errors);
            })
        },
        setError(errors) {
            return this.errors = errors;
        },
        getError(key) {
            return !!this.errors && this.errors[key] !== undefined ? this.errors[key][0] : null;
        },
    }
}
</script>

<style scoped>

</style>
