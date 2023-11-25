<template>
    <div>
        <hr>
        <UserShow v-for="(userFollower, i) in userFollowers" :key="i" :user="userFollower" :name="'userFollowers'"/>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import UserShow from "../user/UserShow.vue";

export default {
    name: "Follower",
    components: {UserShow},
    computed: {
        ...mapState(['userFollowers', 'user']),
    },
    created() {
        this.getUserFollowers(this?.user?.id);
    },
    methods: {
        ...mapActions([
            'getUserFollowers',
        ]),
    }

}
</script>

<style scoped>

</style>
