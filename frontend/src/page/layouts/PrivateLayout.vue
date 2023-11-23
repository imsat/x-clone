<template>
    <div>
        <!--        <Navbar/>-->
        <div class="container min-vh-100">
            <div class="row">
                <div class="col-md-3 d-none d-md-block">
                    <LeftSidebar/>
                </div>
                <div class="col-md-5 border border-top-0 g-0">
                    <slot/>
                </div>
                <div class="col-md-4 d-none d-md-block pt-2">
                    <RightSidebar/>
                </div>
            </div>
        </div>
        <!--        <Footer/>-->
    </div>
</template>

<script>
import Navbar from "../../components/default/Navbar.vue";
import Footer from "../../components/default/Footer.vue";
import LeftSidebar from "../../components/default/LeftSidebar.vue";
import RightSidebar from "../../components/default/RightSidebar.vue";

export default {
    name: "PrivateLayout",
    components: {
        Navbar,
        Footer,
        LeftSidebar,
        RightSidebar
    },
}
</script>
<style scoped>

</style>
