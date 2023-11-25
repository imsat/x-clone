<template>
    <div>
        <hr>
        <Tweet v-for="(tweet, i) in tweets" :key="i" :tweet="tweet"/>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import Tweet from "../tweet/Tweet.vue";

export default {
    name: "Post",
    components: {Tweet},
    computed: {
        ...mapState(['tweets', 'user']),
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
