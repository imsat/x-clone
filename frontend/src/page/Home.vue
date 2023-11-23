<template>
    <div class="row ">
        <div class="col-md-3 d-none d-md-block">
            <router-link to="/" class="text-decoration-none fw-bold text-primary h1">Y</router-link>
            <router-link :to="sidebarLink.path" class="btn btn-lg fw-bold border-0 d-block text-start ps-0"
                         v-for="sidebarLink in sidebarLinks" :key="sidebarLink.id">
                <i :class="`bi bi-${sidebarLink.icon} font-25 pe-3`"></i> {{ sidebarLink.name }}
            </router-link>
            <div class="dropdown" v-if="token">
                <a href="#" class="d-block link-body-emphasis text-decoration-none "
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://github.com/mdo.png" alt="Profile image"
                                 class="rounded-circle profile-img">
                        </div>
                        <div class="ms-3 w-100 h-100 d-flex justify-content-between">
                            <div>
                                <p class="mb-0 ">Johon Doe</p>
                                <p class="mb-0 text-secondary small">@johonDoe</p>
                            </div>
                            <i class="bi bi-three-dots h-50 my-auto"></i>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu text-small">
                    <li>
                        <router-link to="/profile" class="dropdown-item">Profile</router-link>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="logout()">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 border border-top-0 g-0">
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="3"
                              placeholder="What is happening?!"></textarea>

                    <button type="button" class="btn btn-primary float-end rounded-5 px-3 pe-3">Post</button>
                </div>
            </div>
            <hr class="mt-1">
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 ">Johon Doe <span class="text-secondary small">@johonDoe</span></p>
                    <p class="mb-0 "></p>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
            <hr>
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 ">Johon Doe <span class="text-secondary small">@johonDoe</span></p>
                    <p class="mb-0 "></p>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
            <hr>
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 ">Johon Doe <span class="text-secondary small">@johonDoe</span></p>
                    <p class="mb-0 "></p>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
            <hr>
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 ">Johon Doe <span class="text-secondary small">@johonDoe</span></p>
                    <p class="mb-0 "></p>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
            <hr>
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 ">Johon Doe <span class="text-secondary small">@johonDoe</span></p>
                    <p class="mb-0 "></p>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
            <hr>
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 ">Johon Doe <span class="text-secondary small">@johonDoe</span></p>
                    <p class="mb-0 "></p>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
            <hr>
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 ">Johon Doe <span class="text-secondary small">@johonDoe</span></p>
                    <p class="mb-0 "></p>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
            <hr>
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 ">Johon Doe <span class="text-secondary small">@johonDoe</span></p>
                    <p class="mb-0 "></p>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
            <hr>
            <div class="d-flex p-3">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0">Johon Doe <span class="text-secondary small">@johonDoe</span></p>
                    <p class="mb-0 "></p>
                    This is some content from a media component. You can replace this with any content and adjust it as
                    needed.
                </div>
            </div>
        </div>
        <div class="col-md-3 d-none d-md-block pt-2">
            <input type="search" class="form-control mb-3" placeholder="Search..." aria-label="Search">
            <div class="card">
                <div class="card-body">
                    <h4>Who to follow</h4>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://github.com/mdo.png" alt="Profile image"
                                 class="rounded-circle profile-img">
                        </div>
                        <div class=" ms-3 w-100 d-flex justify-content-between">
                            <div>
                                <p class="mb-0 ">Johon Doe</p>
                                <p class="mb-0 text-secondary small">@johonDoe</p>
                            </div>
                            <button class="btn btn-light h-50 my-auto rounded-5 btn-sm px-3 me-1">Follow</button>

                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://github.com/mdo.png" alt="Profile image"
                                 class="rounded-circle profile-img">
                        </div>
                        <div class=" ms-3 w-100 d-flex justify-content-between">
                            <div>
                                <p class="mb-0 ">Johon Doe</p>
                                <p class="mb-0 text-secondary small">@johonDoe</p>
                            </div>
                            <button class="btn btn-light h-50 my-auto rounded-5 btn-sm px-3 me-1">Follow</button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions, mapState} from "vuex";

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
    },
    computed: {
        ...mapState(['token']),
    },
    created() {
        this.getTweets();
    },
    methods: {
        ...mapActions(['getTweets', 'logout'])
    }
}
</script>
<style scoped>

</style>
