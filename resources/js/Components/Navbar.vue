<script setup>
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const page = usePage();
const authUser = page.props.auth.user;
const navOpen = ref(false);
</script>

<template>
    <nav class="navbar navbar-dark bg-dark shadow-sm px-3 sticky-top">
        <!-- Brand -->
        <Link :href="route('home')" class="navbar-brand font-weight-bold">
            Ingco<span class="text-danger">Blog</span>
        </Link>

        <!-- Desktop Links (hidden on mobile) -->
        <div
            class="d-none d-lg-flex align-items-center ml-auto"
            style="gap: 1.5rem"
        >
            <template v-if="authUser">
                <Link
                    :href="route('home')"
                    class="text-white-50 text-decoration-none small font-weight-bold text-uppercase"
                    style="letter-spacing: 1px"
                    >Home</Link
                >
                <Link
                    :href="route('posts.index')"
                    class="text-white-50 text-decoration-none small font-weight-bold text-uppercase"
                    style="letter-spacing: 1px"
                    >Posts</Link
                >
                <Link
                    :href="route('posts.my')"
                    class="text-white-50 text-decoration-none small font-weight-bold text-uppercase"
                    style="letter-spacing: 1px"
                    >My Posts</Link
                >
                <Link
                    :href="route('profile.edit')"
                    class="text-white-50 text-decoration-none small font-weight-bold text-uppercase"
                    style="letter-spacing: 1px"
                    >Profile</Link
                >
                <Link
                    :href="route('posts.create')"
                    class="btn btn-danger btn-sm font-weight-bold px-3"
                    >+ New Post</Link
                >
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="btn btn-outline-secondary btn-sm"
                    >Logout</Link
                >
            </template>
            <template v-else>
                <Link
                    :href="route('login')"
                    class="text-white-50 text-decoration-none small font-weight-bold text-uppercase"
                    style="letter-spacing: 1px"
                    >Login</Link
                >
                <Link
                    :href="route('register')"
                    class="btn btn-danger btn-sm font-weight-bold px-3"
                    >Get Started</Link
                >
            </template>
        </div>

        <!-- Hamburger (mobile only) -->
        <button
            class="navbar-toggler d-lg-none border-0"
            type="button"
            @click="navOpen = !navOpen"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Mobile Dropdown -->
        <transition name="slide">
            <div
                v-if="navOpen"
                class="w-100 d-lg-none bg-dark border-top border-secondary mt-2"
            >
                <template v-if="authUser">
                    <Link
                        :href="route('home')"
                        class="d-block px-3 py-2 text-white-50 text-decoration-none border-bottom border-secondary small font-weight-bold text-uppercase"
                        @click="navOpen = false"
                        style="letter-spacing: 1px"
                        >Home</Link
                    >
                    <Link
                        :href="route('posts.index')"
                        class="d-block px-3 py-2 text-white-50 text-decoration-none border-bottom border-secondary small font-weight-bold text-uppercase"
                        @click="navOpen = false"
                        style="letter-spacing: 1px"
                        >All Posts</Link
                    >
                    <Link
                        :href="route('posts.my')"
                        class="d-block px-3 py-2 text-white-50 text-decoration-none border-bottom border-secondary small font-weight-bold text-uppercase"
                        @click="navOpen = false"
                        style="letter-spacing: 1px"
                        >My Posts</Link
                    >
                    <Link
                        :href="route('profile.edit')"
                        class="d-block px-3 py-2 text-white-50 text-decoration-none border-bottom border-secondary small font-weight-bold text-uppercase"
                        @click="navOpen = false"
                        style="letter-spacing: 1px"
                        >Profile</Link
                    >
                    <div class="px-3 py-3 d-flex" style="gap: 0.75rem">
                        <Link
                            :href="route('posts.create')"
                            class="btn btn-danger btn-sm font-weight-bold flex-grow-1 text-center"
                            @click="navOpen = false"
                            >+ New Post</Link
                        >
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="btn btn-outline-secondary btn-sm flex-grow-1"
                            @click="navOpen = false"
                            >Logout</Link
                        >
                    </div>
                </template>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="d-block px-3 py-2 text-white-50 text-decoration-none border-bottom border-secondary small font-weight-bold text-uppercase"
                        @click="navOpen = false"
                        style="letter-spacing: 1px"
                        >Login</Link
                    >
                    <div class="px-3 py-3">
                        <Link
                            :href="route('register')"
                            class="btn btn-danger btn-sm font-weight-bold w-100 text-center"
                            @click="navOpen = false"
                            >Get Started</Link
                        >
                    </div>
                </template>
            </div>
        </transition>
    </nav>
</template>

<style scoped>
.text-white-50:hover {
    color: #fff !important;
    transition: color 0.2s;
}

.slide-enter-active,
.slide-leave-active {
    transition: all 0.25s ease;
}

.slide-enter-from,
.slide-leave-to {
    opacity: 0;
    transform: translateY(-8px);
}
</style>
