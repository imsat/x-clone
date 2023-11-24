<template>
    <div class="sticky-top">
        <input type="search" class="form-control mb-3" placeholder="Search..." aria-label="Search" @keyup="searchUser"
               v-model="search" @input="handleInput" ref="input">
        <div class="card">
            <div class="card-body">
                <h4>Who to follow</h4>
                <div class="d-flex align-items-center" v-for="(randomUser, i) in randomUsers" :key="i">
                    <div class="flex-shrink-0">
                        <img src="https://github.com/mdo.png" alt="Profile image"
                             class="rounded-circle profile-img">
                    </div>
                    <div class=" ms-3 w-100 d-flex justify-content-between">
                        <div>
                            <p class="mb-0 ">{{ randomUser?.name }}</p>
                            <p class="mb-0 text-secondary small">@{{ randomUser?.user_name }}</p>
                        </div>
                        <button
                            class="btn btn-dark-outline h-50 my-auto rounded-5 btn-sm px-3 me-1"
                            @click="unfollowUser(randomUser)"
                            v-if="isObjectEmpty(randomUser?.following)"
                        >Following</button>
                        <button
                            class="btn btn-light h-50 my-auto rounded-5 btn-sm px-3 me-1"

                            @click="userFollow(randomUser.id)"
                            v-else
                        >Follow</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center text-secondary small py-3">© 2023 Y Corp.</div>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import {confirm} from '../../utils/swalUtil.js'
import debounce from "lodash/debounce";

export default {
    name: "RightSidebar",
    data() {
        return {
            search: ''
        }
    },
    computed: {
        ...mapState(['randomUsers']),
    },
    created() {
        this.getRandomUser({random: true})
    },
    methods: {
        ...mapActions(['getRandomUser', 'userFollow', 'userUnfollow']),
        unfollowUser(user) {
            const title = 'Their posts will no longer show up in your For You timeline. You can still view their profile, unless their posts are protected.'
            confirm('Unfollow @' + user?.user_name, title).then(res => {
                if (res.value) {
                    this.userUnfollow(user.id)
                }
            })
        },
        searchUser: debounce(function (value) {
            this.getRandomUser({search: this.search})

        }, 1000),
        handleInput() {
            if (this.search === '') {
                this.getRandomUser({random: true})
            }
        }

    }
}
</script>

<style scoped>

</style>
