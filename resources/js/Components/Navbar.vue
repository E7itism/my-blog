<script setup>
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const page = usePage();
const authUser = page.props.auth.user;
const navOpen = ref(false);
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <Link :href="route('home')" class="navbar-brand">My Blog</Link>
        <button
            class="navbar-toggler"
            type="button"
            @click="navOpen = !navOpen"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" :class="{ show: navOpen }">
            <ul class="navbar-nav ml-auto">
                <template v-if="authUser">
                    <li class="nav-item">
                        <Link :href="route('home')" class="nav-link">Home</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('posts.index')" class="nav-link"
                            >All Posts</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link :href="route('posts.my')" class="nav-link"
                            >My Posts</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link :href="route('posts.create')" class="nav-link"
                            >New Post</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link :href="route('profile.edit')" class="nav-link"
                            >Profile</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="nav-link"
                            >Logout</Link
                        >
                    </li>
                </template>
                <template v-else>
                    <li class="nav-item">
                        <Link :href="route('login')" class="nav-link"
                            >Login</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link :href="route('register')" class="nav-link"
                            >Register</Link
                        >
                    </li>
                </template>
            </ul>
        </div>
    </nav>
</template>
