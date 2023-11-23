import Vue from 'vue';
Vue.mixin({
    methods: {
        isObjectEmpty(someObject){
            return someObject && (Object.keys(someObject).length) > 0
        },
    }
});

