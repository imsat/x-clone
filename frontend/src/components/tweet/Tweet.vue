<template>
    <div>
        <div class="d-flex p-3 border-bottom">
            <div class="flex-shrink-0">
                <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="mb-0">
                    <span class="fw-bold">{{ tweet?.user?.name }}</span>
                    <span class="text-secondary small"> @{{ tweet?.user?.user_name }}</span>

                    <i class="bi bi-hand-thumbs-up-fill float-end cursor-pointer"
                       @click="tweetLikeOrDislike({userId: user?.id, tweetId: tweet?.id, operation: 'dislike', name: name})"
                       title="Dislike"
                       v-if="isObjectEmpty(tweet?.user_likes)"
                    >
                        {{ tweet?.likes_count }}
                    </i>

                    <i class="bi bi-hand-thumbs-up float-end cursor-pointer"
                       @click="tweetLikeOrDislike({userId: user?.id, tweetId: tweet?.id, operation: 'like', name: name})"
                       title="Like"
                       v-else
                    >
                        {{ tweet?.likes_count }}
                    </i>
                </p>
                <p class="mb-0">{{ tweet?.content }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";

export default {
    name: "Tweet",
    props: ['tweet', 'name'],
    computed: {
        ...mapState(['user']),
    },
    methods: {
        ...mapActions([
            'tweetLikeOrDislike',
        ]),
    }
}
</script>

<style scoped>

</style>
