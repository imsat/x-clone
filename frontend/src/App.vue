<template>
    <div id="app">
        <Navbar/>
        <router-view></router-view>
        <Footer/>
    </div>
</template>

<script>
import Navbar from "./components/default/Navbar.vue";
import Footer from "./components/default/Footer.vue";

export default {
    name: "App",
    components: {
        Navbar,
        Footer
    },
};
</script>

<style>
</style>
