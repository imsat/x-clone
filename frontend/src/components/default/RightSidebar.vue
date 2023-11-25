<template>
    <div class="sticky-top">
        <input type="search" class="form-control mb-3" placeholder="Search..." aria-label="Search" @keyup="searchUser"
               v-model="search" @input="handleInput" ref="input">
        <div class="card">
            <div class="card-body">
                <h4>Who to follow</h4>
                <UserShow v-for="(randomUser, i) in randomUsers" :user="randomUser" :key="i" :name="'randomUsers'"/>
            </div>
        </div>

        <div class="text-center text-secondary small py-3">© 2023 Y Corp.</div>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import debounce from "lodash/debounce";
import UserShow from "../user/UserShow.vue";

export default {
    name: "RightSidebar",
    data() {
        return {
            search: ''
        }
    },
    components: {
        UserShow
    },
    computed: {
        ...mapState(['randomUsers']),
    },
    created() {
        this.getRandomUser({random: true})
    },
    methods: {
        ...mapActions(['getRandomUser']),
        searchUser: debounce(function (value) {
            this.getRandomUser({search: this.search})

        }, 1000),
        handleInput() {
            if (this.search === '') {
                this.getRandomUser({random: true})
            }
        }

    }
}
</script>

<style scoped>

</style>
