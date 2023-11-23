<template>
    <div class="sticky-top">
        <router-link to="/" class="text-decoration-none fw-bold text-primary h1">Y</router-link>

        <router-link :to="sidebarLink.path" class="btn btn-lg fw-bold border-0 d-block text-start ps-0"
                     v-for="sidebarLink in sidebarLinks" :key="sidebarLink.id">
            <i :class="`bi bi-${sidebarLink.icon} font-25 pe-3`"></i> {{ sidebarLink.name }}
        </router-link>
        <div class="dropdown" v-if="token">
            <a href="#" class="d-block link-body-emphasis text-decoration-none "
               data-bs-toggle="dropdown" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="https://github.com/mdo.png" alt="Profile image"
                             class="rounded-circle profile-img">
                    </div>
                    <div class="ms-3 w-100 h-100 d-flex justify-content-between">
                        <div>
                            <p class="mb-0 ">{{user?.name}}</p>
                            <p class="mb-0 text-secondary small">@{{user?.user_name}}</p>
                        </div>
                        <i class="bi bi-three-dots h-50 my-auto"></i>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu text-small">
                <li>
                    <router-link to="/profile" class="dropdown-item">Profile</router-link>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="javascript:void(0)" @click="logout()">Sign out</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";

export default {
    name: "LeftSidebar",
    data() {
        return {
            sidebarLinks: [
                {'id': 1, 'name': 'Home', 'path': '/', 'icon': 'house-door'},
                {'id': 2, 'name': 'Explore', 'path': '#', 'icon': 'search'},
                {'id': 3, 'name': 'Notification', 'path': '#', 'icon': 'bell'},
                {'id': 4, 'name': 'Messages', 'path': '#', 'icon': 'envelope'},
                {'id': 5, 'name': 'Profile', 'path': '/profile', 'icon': 'person'},
                {'id': 6, 'name': 'More', 'path': '#', 'icon': 'three-dots'},
            ]
        }
    },
    computed: {
        ...mapState(['token', 'user']),
    },
    methods: {
        ...mapActions(['logout'])
    }
}
</script>

<style scoped>

</style>
