<template>
    <div>
        <hr>
        <UserShow v-for="(userFollowing, i) in userFollowings" :key="i" :user="userFollowing" :name="'userFollowings'"/>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import UserShow from "../user/UserShow.vue";

export default {
    name: "Following",
    components: {UserShow},
    computed: {
        ...mapState(['userFollowings', 'user']),
    },
    created() {
        this.getUserFollowings(this?.user?.id);
    },
    methods: {
        ...mapActions([
            'getUserFollowings',
        ]),
    }

}
</script>

<style scoped>

</style>
