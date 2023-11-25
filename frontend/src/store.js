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
        tweet_pagination: {
            current_page: 0
        },
        userFollowers: [],
        userFollowings: [],
        tweetForm: {
            content: ''
        },
        randomUsers: [],
        errors: []
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
            data.map(tweet => {
                state.tweets.push(tweet)
            });
        },
        SET_USER_TWEETS(state, data) {
            state.userTweets = data
        },
        SET_USER_FOLLOWERS(state, data) {
            state.userFollowers = data
        },
        SET_USER_FOLLOWINGS(state, data) {
            state.userFollowings = data
        },
        SET_TWEET_CONTENT(state, value) {
            state.tweetForm.content = value
        },
        ADD_TWEET(state, data) {
            state.tweets.unshift(data);
            state.tweetForm.content = ''
        },
        SET_TWEET_PAGINATION(state, data) {
            state.tweet_pagination = data;
        },
        SET_RANDOM_USER(state, data) {
            state.randomUsers = data;
        },
        SET_USER_FOLLOW(state, value) {
            let index = state[value.name].map(user => user.id).indexOf(value.userId)
            let user = state[value.name][index]
            user.followers.push({user_id: value.userId})
            if (index > -1) Vue.set(state[value.name], index, user)
        },
        SET_USER_UNFOLLOW(state, value) {
            let index = state[value.name].map(user => user.id).indexOf(value.userId)
            let user = state[value.name][index]
            user.followers = []
            if (index > -1) Vue.set(state[value.name], index, user)
        },
        SET_ERROR(state, error) {
            state.errors = error
        },
        SET_LIKE_OR_DISLIKE(state, value) {
            let index = state[value.name].map(tweet => tweet.id).indexOf(value.tweetId)

            if (index > -1) {
                let tweet = state[value.name][index]
                let tweet_likes_count = parseInt(tweet?.likes_count)
                if (value?.operation == 'like') {
                    tweet.likes_count = tweet_likes_count >= 0 ? tweet_likes_count + 1 : 0
                    tweet.user_likes.push({user_id: value.userId, tweet_id: tweet.id})
                    Vue.set(state[value.name], index, tweet)
                } else {
                    tweet.likes_count = tweet_likes_count >= 0 ? tweet_likes_count - 1 : 0
                    tweet.user_likes = []
                    Vue.set(state[value.name], index, tweet)
                }
            }
        }
    },
    actions: {
        async logout({commit}) {
            try {
                await post('/logout')
                    .then((res) => {
                        commit('SET_USER', null)
                        commit('SET_TOKEN', null)
                        successToast(res?.data?.message)
                        router.push({name: 'login'})
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
        async getTweets({commit}, payload) {
            try {
                await getWithParams('/tweets', payload)
                    .then((res) => {
                        let {data, ...rest} = res?.data?.data
                        commit('SET_TWEETS', data)
                        commit('SET_TWEET_PAGINATION', rest)
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
        async tweetLikeOrDislike({commit}, data) {
            try {
                await get(`/users/${data.userId}/tweets/${data.tweetId}/${data.operation}`)
                    .then((res) => {
                        commit('SET_LIKE_OR_DISLIKE', data)
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
        async getUserTweets({commit}, userId) {
            try {
                await get(`/users/${userId}/tweets`)
                    .then((res) => {
                        commit('SET_USER_TWEETS', res?.data?.data.data)
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
        async getUserFollowers({commit}, userId) {
            try {
                await get(`/users/${userId}/followers`)
                    .then((res) => {
                        let {data, ...rest} = res?.data?.data
                        commit('SET_USER_FOLLOWERS', data)
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
        async getUserFollowings({commit}, userId) {
            try {
                await get(`/users/${userId}/following`)
                    .then((res) => {
                        let {data, ...rest} = res?.data?.data
                        commit('SET_USER_FOLLOWINGS', data)
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
        async userFollow({commit}, payload) {
            try {
                await post(`/users/${payload.userId}/follow`)
                    .then((res) => {
                        commit('SET_USER_FOLLOW', payload)
                        successToast(res?.data?.message)
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
        async userUnfollow({commit}, payload) {
            try {
                await post(`/users/${payload.userId}/unfollow`)
                    .then((res) => {
                        commit('SET_USER_UNFOLLOW', payload)
                        successToast(res?.data?.message)
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
        async createTweet({state, commit}) {
            try {
                await post(`/tweets`, state.tweetForm)
                    .then((res) => {
                        commit('ADD_TWEET', res?.data?.data)
                        successToast(res?.data?.message)
                    })
            } catch (error) {
                commit('SET_ERROR', error?.response?.data?.errors)
                errorToast(error?.response?.data?.message)
            }
        },
        async getRandomUser({state, commit}, payload) {
            try {
                await getWithParams(`/users`, payload)
                    .then((res) => {
                        commit('SET_RANDOM_USER', res?.data?.data?.data)
                    })
            } catch (error) {
                errorToast(error?.response?.data?.message)
            }
        },
    }
});
