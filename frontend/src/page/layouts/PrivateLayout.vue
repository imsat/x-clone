<template>
    <div>
<!--        <Navbar/>-->
        <div class="container ">
            <slot/>
        </div>
        <Footer/>
    </div>
</template>

<script>
import Navbar from "../../components/default/Navbar.vue";
import Footer from "../../components/default/Footer.vue";

export default {
    name: "PrivateLayout",
    components: {
        Navbar,
        Footer,
    },
}
</script>
<style scoped>

</style>
