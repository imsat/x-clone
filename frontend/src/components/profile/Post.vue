<template>
    <div>
        <hr>
        <Tweet v-for="(tweet, i) in userTweets" :key="i" :tweet="tweet" :name="'userTweets'"/>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import Tweet from "../tweet/Tweet.vue";

export default {
    name: "Post",
    components: {Tweet},
    computed: {
        ...mapState(['userTweets', 'user']),
    },
    created() {
        this.getUserTweets(this?.user?.id);
    },
    methods: {
        ...mapActions([
            'getUserTweets',
        ]),
    }

}
</script>

<style scoped>

</style>
