<template>
    <div class="">
        <div class="d-flex p-3">
            <div class="flex-shrink-0">
                <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
            </div>
            <div class="flex-grow-1 ms-3">
                    <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="3"
                              placeholder="What is happening?!"></textarea>

                <button type="button" class="btn btn-primary float-end rounded-5 px-3 pe-3">Post</button>
            </div>
        </div>
        <hr class="mt-1">
        <div v-for="tweet in tweets.data" :key="tweet.id">
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0">{{tweet?.user?.name}} <span class="text-secondary small">@{{tweet?.user?.user_name}}</span></p>
                    <p class="mb-0 "></p>
                    {{tweet?.content}}
                </div>
            </div>
            <hr>
        </div>
    </div>
</template>
<script>
import {mapActions, mapState} from "vuex";

export default {
    name: "Home",
    computed: {
        ...mapState(['tweets', 'user']),
    },
    created() {
        this.getTweets();
    },
    methods: {
        ...mapActions([
            'getTweets',

        ])
    }
}
</script>
<style scoped>

</style>
