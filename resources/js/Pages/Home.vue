<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";
import Footer from "@/Components/Footer.vue";

const props = defineProps({
    posts: Array,
});

const page = usePage();
const authUser = page.props.auth.user;
</script>

<template>
    <Head title="Home" />
    <div class="d-flex flex-column min-vh-100">
        <!-- Use Navbar component — no more duplicate! -->
        <Navbar />

        <!-- HERO -->
        <div class="bg-dark text-white py-5">
            <div class="container py-3">
                <h1 class="display-4 font-weight-bold mb-3">
                    Stories worth <span class="text-danger">reading.</span>
                </h1>
                <p class="lead text-secondary mb-4">
                    Discover posts from writers around the world.
                </p>
                <template v-if="!authUser">
                    <Link
                        :href="route('register')"
                        class="btn btn-danger btn-lg font-weight-bold mr-3"
                        >Start Writing</Link
                    >
                    <Link
                        :href="route('login')"
                        class="btn btn-outline-light btn-lg"
                        >Sign In</Link
                    >
                </template>
                <template v-else>
                    <Link
                        :href="route('posts.create')"
                        class="btn btn-danger btn-lg font-weight-bold mr-3"
                        >+ New Post</Link
                    >
                    <Link
                        :href="route('posts.my')"
                        class="btn btn-outline-light btn-lg"
                        >My Posts</Link
                    >
                </template>
            </div>
        </div>

        <!-- POSTS SECTION -->
        <div class="bg-light py-5">
            <div class="container">
                <!-- Section Title -->
                <div class="mb-4">
                    <h2 class="font-weight-bold mb-1">Latest Posts</h2>
                    <div
                        style="
                            width: 50px;
                            height: 4px;
                            background: #dc3545;
                            border-radius: 2px;
                        "
                    ></div>
                </div>

                <!-- Empty State -->
                <div v-if="posts.length === 0" class="text-center py-5">
                    <p style="font-size: 3rem">✍️</p>
                    <h5 class="text-muted">
                        No posts yet. Be the first to write one!
                    </h5>
                    <Link
                        v-if="authUser"
                        :href="route('posts.create')"
                        class="btn btn-danger mt-3 font-weight-bold"
                        >Write Now</Link
                    >
                </div>

                <!-- Post Cards -->
                <div
                    v-for="post in posts"
                    :key="post.id"
                    class="card mb-4 border-0 shadow-sm"
                >
                    <div class="card-body p-4">
                        <div
                            class="d-flex justify-content-between align-items-center mb-2"
                        >
                            <small
                                class="text-danger font-weight-bold text-uppercase"
                                >{{ post.user.name }}</small
                            >
                            <small class="text-muted"
                                >💬 {{ post.comments.length }}</small
                            >
                        </div>
                        <h5 class="card-title font-weight-bold mb-2">
                            {{ post.title }}
                        </h5>
                        <p class="card-text text-muted mb-3">
                            {{ post.content.substring(0, 200) }}...
                        </p>
                        <Link
                            :href="route('posts.show', post.id)"
                            class="btn btn-dark btn-sm font-weight-bold"
                        >
                            Read More →
                        </Link>
                    </div>
                    <div style="height: 3px; background: #dc3545"></div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <Footer />
    </div>
</template>
