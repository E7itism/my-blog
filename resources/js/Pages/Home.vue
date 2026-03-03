<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    posts: Array,
});

const page = usePage();
const authUser = page.props.auth.user;
const navOpen = ref(false);
</script>

<template>
    <Head title="Home" />
    <div>
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
                            <Link :href="route('home')" class="nav-link"
                                >Home</Link
                            >
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

        <div class="container mt-4">
            <h2 class="mb-4">All Blog Posts</h2>
            <div v-if="posts.length === 0" class="alert alert-info">
                No posts yet. Be the first to write one!
            </div>
            <div v-for="post in posts" :key="post.id" class="card mb-4">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between align-items-center"
                    >
                        <h5 class="card-title">{{ post.title }}</h5>
                        <small class="text-muted"
                            >by {{ post.user.name }}</small
                        >
                    </div>
                    <p class="card-text">
                        {{ post.content.substring(0, 200) }}...
                    </p>
                    <div
                        class="d-flex justify-content-between align-items-center"
                    >
                        <Link
                            :href="route('posts.show', post.id)"
                            class="btn btn-primary btn-sm"
                            >Read more</Link
                        >
                        <small class="text-muted"
                            >{{ post.comments.length }} comments</small
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
