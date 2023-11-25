<template>
    <div class="card mb-3" style="position: relative">
        <img
            src="https://images.unsplash.com/photo-1682695797221-8164ff1fafc9?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            class="card-img-top" height="200px" alt="">
        <div class="card-body">
            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img-big">
            <h5 class="card-title pt-4 mb-0">{{ user?.name }}</h5>
            <small class="text-secondary">@{{ user?.user_name }}</small>
            <p class="card-text">Email: {{ user?.email }}</p>
        </div>
        <ul class="nav nav-underline px-3">
            <li class="nav-item" v-for="profileTab in profileTabs" :key="profileTab.id">
                <a class="nav-link" :class="activeTab=== profileTab.value ? 'active': ''" aria-current="page"
                   href="#" @click="activeTab = profileTab.value">{{ profileTab.name }}</a>
            </li>
        </ul>
        <Post v-if="activeTab === 'post'"/>
        <Following v-else-if="activeTab === 'following'"/>
        <Follower v-else-if="activeTab === 'followers'"/>
    </div>
</template>

<script>
import {mapState} from "vuex";
import Post from "../components/profile/Post.vue";
import Following from "../components/profile/Following.vue";
import Follower from "../components/profile/Follower.vue";

export default {
    name: "Profile",
    components: {
        Post,
        Following,
        Follower
    },
    data() {
        return {
            profileTabs: [
                {id: 1, name: 'Post', value: 'post'},
                {id: 2, name: 'Following', value: 'following'},
                {id: 3, name: 'Followers', value: 'followers'}
            ],
            activeTab: 'post'
        }
    },
    computed: {
        ...mapState(['user']),
    }
}
</script>

<style scoped>

</style>
