<template>
    <div class="form-signin w-100 m-auto">
        <h2 class="h3 mb-3 fw-normal">Create your account</h2>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingName" v-model="registerForm.name" placeholder="Name" autocomplete="off">
            <label for="floatingName">Name</label>
            <Validation :error-text="getError('name')" />
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingUserName" v-model="registerForm.user_name" placeholder="User name" autocomplete="off">
            <label for="floatingUserName">User Name</label>
            <Validation :error-text="getError('user_name')" />
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" v-model="registerForm.email" placeholder="Email" autocomplete="off">
            <label for="floatingInput">Email address</label>
            <Validation :error-text="getError('email')" />
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" v-model="registerForm.password" placeholder="Password" autocomplete="off">
            <label for="floatingPassword">Password</label>
            <Validation :error-text="getError('password')" />
        </div>
        <button class="btn btn-primary w-100 py-2 my-3" type="button" @click.prevent="register">Sign up</button>

        <p class="my-5 text-center">Already have an account?
            <router-link to="/login">Sign in</router-link>
        </p>
    </div>
</template>

<script>
import {post} from "../utils/fetchAPI.js";
import {mapMutations} from "vuex";
export default {
    name: "Signup",
    data() {
        return {
            registerForm: {
                name:'',
                user_name:'',
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
        async register() {
            await post('/register', this.registerForm).then(res => {
                const {token, user} = res?.data?.data
                this.SET_USER(user)
                this.SET_TOKEN(token)
                this.registerForm = {}
                this.$router.push('/')
            }).catch(errors => {
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
