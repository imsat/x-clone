<template>
    <div class="row">
        <div class="col-md-3 d-none d-md-block">
            <div class="d-flex flex-column float-start">
                <router-link :to="sidebarLink.path" class="btn btn-lg fw-bold border-0 d-flex float-start"
                             v-for="sidebarLink in sidebarLinks" :key="sidebarLink.id">
                    <i :class="`bi bi-${sidebarLink.icon} font-25 pe-3`"></i> {{ sidebarLink.name }}
                </router-link>
            </div>

        </div>
        <div class="col-md-6">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
        </div>
        <div class="col-md-3 d-none d-md-block bg-danger">Lorem ipsum dolor sit amet.</div>
    </div>
</template>
<script>
export default {
    name: "Home",
    data() {
        return {
            sidebarLinks: [
                {'id': 1, 'name': 'Home', 'path': '/', 'icon': 'house-door'},
                {'id': 2, 'name': 'Explore', 'path': '#', 'icon': 'search'},
                {'id': 3, 'name': 'Notification', 'path': '#', 'icon': 'bell'},
                {'id': 4, 'name': 'Messages', 'path': '#', 'icon': 'envelope'},
                {'id': 5, 'name': 'Profile', 'path': '/profile', 'icon': 'person'},
                {'id': 6, 'name': 'More', 'path': '#', 'icon': 'three-dots'},
            ]
        }
    }
}
</script>
<style scoped>

</style>
