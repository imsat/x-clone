<template>
    <div class="d-flex align-items-center">
        <div class="flex-shrink-0">
            <img src="https://github.com/mdo.png" alt="Profile image"
                 class="rounded-circle profile-img">
        </div>
        <div class=" ms-3 w-100 d-flex justify-content-between">
            <div>
                <p class="mb-0 ">{{ user?.name }}</p>
                <p class="mb-0 text-secondary small">@{{ user?.user_name }}</p>
            </div>
            <button
                class="btn btn-dark-outline h-50 my-auto rounded-5 btn-sm px-3 me-1"
                @click="unfollowUser(user)"
                v-if="isObjectEmpty(user?.followers)"
            >
                Following
            </button>
            <button
                class="btn btn-light h-50 my-auto rounded-5 btn-sm px-3 me-1"
                @click="userFollow({userId: user.id, name: name})"
                v-else
            >Follow
            </button>
        </div>
    </div>
</template>

<script>
import {confirm} from "../../utils/swalUtil.js";
import {mapActions} from "vuex";

export default {
    name: "UserShow",
    props: ['user', 'name'],
    methods: {
        ...mapActions(['userFollow', 'userUnfollow']),
        unfollowUser(user) {
            const title = 'Their posts will no longer show up in your For You timeline. You can still view their profile, unless their posts are protected.'
            confirm('Unfollow @' + user?.user_name, title).then(res => {
                if (res.value) {
                    this.userUnfollow({userId: user.id, name: this.name})
                }
            })
        },
    }
}
</script>

<style scoped>

</style>
