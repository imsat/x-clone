import Vue from 'vue';
import Vuex from 'vuex';
import {getItem, removeItem, setItem} from "./utils/localStorageUtil.js";
import {get, getWithParams, post} from "./utils/fetchAPI.js";
import {errorToast, successToast} from "./utils/swalUtil.js";
import router from "./routes.js";
Vue.use(Vuex);
export default new Vuex.Store({
    strict: true,
    state: {
        user: getItem('user') || null,
        token: getItem('token') || null,
        isLoading: false,
        tweets: [],
        userTweets: [],
        userFollowers: [],
        userFollowing: [],
        tweetForm: {
            content: ''
        },
        randomUsers: {
            data: [],
            pagination: {
                current_page: 1
            }
        }
    },
    mutations: {
        SET_USER(state, data) {
            state.authUser = data;
            data === null ? removeItem('user') : setItem('user', data)
        },
        SET_TOKEN(state, data) {
            state.token = data;
            data === null ? removeItem('token') : setItem('token', data)
        },
        /** Set global loader */
        SET_IS_LOADING(state) {
            state.isLoading = !state.isLoading
        },
        SET_TWEETS(state, data) {
            state.tweets = data
        },
        SET_USER_TWEETS(state, data) {
            state.userTweets = data
        },
        SET_USER_FOLLOWERS(state, data) {
            state.userFollowers = data
        },
        SET_USER_FOLLOWING(state, data) {
            state.userFollowing = data
        },
        SET_TWEET_CONTENT(state, value) {
            state.tweetForm.content = value
        },
        ADD_TWEET(state, data) {
            state.tweets.unshift(data);
            state.userTweets.unshift(data);
            state.tweetForm.content = ''
        },
        SET_RANDOM_USER(state, data) {
            state.randomUsers = data;
        },
        SET_USER_FOLLOW(state, userId) {
            let index = state.randomUsers.map(user => user.id).indexOf(userId)
            let user =  state.randomUsers[index]
            user.following.push({user_id: userId})
            if (index > -1) Vue.set(state.randomUsers, index, user)
        },
        SET_USER_UNFOLLOW(state, userId) {
            let index = state.randomUsers.map(user => user.id).indexOf(userId)
            let user =  state.randomUsers[index]
            user.following = []
            if (index > -1) Vue.set(state.randomUsers, index, user)
        },
    },
    actions: {
        async logout({commit}){
            try {
                await post('/logout')
                    .then((res) => {
                        commit('SET_USER', null)
                        commit('SET_TOKEN', null)
                        successToast(res?.data?.message)
                        router.push({ name: 'login' })
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
        async getTweets({commit}, payload){
            try {
                await getWithParams('/tweets', payload)
                    .then((res) => {
                        commit('SET_TWEETS', res?.data?.data)
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
        async tweetLike({commit}, data){
            try {
                await get(`/users/${data.userId}/tweets/${data.tweetId}/like`)
                    .then((res) => {
                        successToast(res?.data?.message)
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
        async tweetDislike({commit}, data){
            try {
                await get(`/users/${data.userId}/tweets/${data.tweetId}/dislike`)
                    .then((res) => {
                        successToast(res?.data?.message)
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
        async getUserTweets({commit}, userId){
            try {
                await get(`/users/${userId}/tweets`)
                    .then((res) => {
                        commit('SET_TWEETS', res?.data?.data)
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
        async getUserFollowers({commit}, userId){
            try {
                await get(`/users/${userId}/followers`)
                    .then((res) => {
                        commit('SET_USER_FOLLOWERS', res?.data?.data?.data)
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
        async getUserFollowings({commit}, userId){
            try {
                await get(`/users/${userId}/following`)
                    .then((res) => {
                        commit('SET_USER_FOLLOWING', res?.data?.data?.data)
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
        async userFollow({commit}, userId){
            try {
                await post(`/users/${userId}/follow`)
                    .then((res) => {
                        commit('SET_USER_FOLLOW', userId)
                        successToast(res?.data?.message)
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
        async userUnfollow({commit}, userId){
            try {
                await post(`/users/${userId}/unfollow`)
                    .then((res) => {
                        commit('SET_USER_UNFOLLOW', userId)
                        successToast(res?.data?.message)
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
        async createTweet({state}){
            try {
                await post(`/tweets`, state.tweetForm)
                    .then((res) => {
                        successToast(res?.data?.message)
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
        async getRandomUser({state, commit}, payload){
            try {
                await getWithParams(`/users`, payload)
                    .then((res) => {
                        commit('SET_RANDOM_USER', res?.data?.data?.data)
                    })
            } catch (error) {
                console.log(error.response)
            }
        },
    }
});
