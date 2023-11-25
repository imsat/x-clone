<template>
    <div v-infinite-scroll="loadMore">
        <div class="d-flex p-3">
            <div class="flex-shrink-0">
                <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
            </div>
            <div class="flex-grow-1 ms-3">
                    <textarea
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        placeholder="What is happening?!"
                        :value="tweetForm.content"
                        @input="(e)=>SET_TWEET_CONTENT(e.target.value)"
                    ></textarea>
                <Validation :error-text="getError('content')"/>

                <button type="button" class="btn btn-primary float-end rounded-5 px-3 pe-3 mt-3" @click="createTweet"
                        :disabled="!tweetForm.content">Post
                </button>
            </div>
        </div>
        <hr class="mt-1">
        <Tweet v-for="(tweet, i) in tweets" :key="i" :tweet="tweet" :name="'tweets'"/>
    </div>
</template>
<script>
import {mapActions, mapMutations, mapState} from "vuex";
import Tweet from "../components/tweet/Tweet.vue";
export default {
    name: "Home",
    components: {
        Tweet
    },
    computed: {
        ...mapState(['tweets', 'user', 'tweetForm', 'errors', 'tweet_pagination']),
    },
    // created() {
    //     this.getTweets();
    // },
    methods: {
        ...mapActions([
            'getTweets',
            'createTweet',
            'tweetLikeOrDislike',
        ]),
        ...mapMutations([
            'SET_TWEET_CONTENT'
        ]),
        setError(errors) {
            return this.errors = errors;
        },
        getError(key) {
            return !!this.errors && this.errors[key] !== undefined ? this.errors[key][0] : null;
        },
        loadMore(){
            this.getTweets({page: this.tweet_pagination.current_page + 1});
        }
    }
}
</script>
<style scoped>

</style>
