<template>
    <div class="">
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
        <div v-for="(tweet, i) in tweets" :key="i">
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0">
                        <span class="fw-bold">{{ tweet?.user?.name }}</span>
                        <span class="text-secondary small"> @{{ tweet?.user?.user_name }}</span>

                        <i class="bi bi-hand-thumbs-up-fill float-end cursor-pointer"
                           @click="tweetLikeOrDislike({userId: user?.id, tweetId: tweet?.id, operation: 'dislike'})"
                           title="Dislike"
                           v-if="isObjectEmpty(tweet?.user_likes)"
                        >
                            {{ tweet?.likes_count }}
                        </i>

                        <i class="bi bi-hand-thumbs-up float-end cursor-pointer"
                           @click="tweetLikeOrDislike({userId: user?.id, tweetId: tweet?.id, operation: 'like'})"
                           title="Like"
                           v-else
                        >
                            {{ tweet?.likes_count }}
                        </i>

                    </p>
                    <p class="mb-0">{{ tweet?.content }}</p>
                </div>
            </div>
            <hr>
        </div>
    </div>
</template>
<script>
import {mapActions, mapMutations, mapState} from "vuex";

export default {
    name: "Home",
    computed: {
        ...mapState(['tweets', 'user', 'tweetForm', 'errors']),
    },
    created() {
        this.getTweets();
    },
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
    }
}
</script>
<style scoped>

</style>
