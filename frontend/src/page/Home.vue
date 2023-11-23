<template>
    <div class="row">
        <div class="col-md-3 d-none d-md-block">
                <router-link :to="sidebarLink.path" class="btn btn-lg fw-bold border-0 d-block text-start"
                             v-for="sidebarLink in sidebarLinks" :key="sidebarLink.id">
                    <i :class="`bi bi-${sidebarLink.icon} font-25 pe-3`"></i> {{ sidebarLink.name }}
                </router-link>
        </div>
        <div class="col-md-6">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
                </div>
                <div class="flex-grow-1 ms-3">
                    <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="3"></textarea>

                    <button type="button" class="btn btn-primary float-end">Post</button>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-none d-md-block">
            <input type="search" class="form-control mb-3" placeholder="Search..." aria-label="Search">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
                            <img src="https://github.com/mdo.png" alt="Profile image" class="rounded-circle profile-img">
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
import {mapActions} from "vuex";

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
    created() {
        this.getTweets();
    },
    methods: {
        ...mapActions(['getTweets'])
    }
}
</script>
<style scoped>

</style>
