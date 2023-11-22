<template>
    <div id="app">
        <PrivateLayout v-if="token">
            <router-view/>
        </PrivateLayout>
        <PublicLayout v-else>
            <router-view/>
        </PublicLayout>
        <OverlayLoader v-if="isLoading"/>
    </div>
</template>

<script>
import PrivateLayout from "./page/layouts/PrivateLayout.vue";
import PublicLayout from "./page/layouts/PublicLayout.vue";
import {mapState} from "vuex";
import OverlayLoader from "./components/OverlayLoader.vue";

export default {
    name: "App",
    components: {
        PrivateLayout,
        PublicLayout,
        OverlayLoader
    },
    computed: {
        ...mapState(['token', 'isLoading']),
    },
};
</script>

<style>
</style>
