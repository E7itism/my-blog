<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

const props = defineProps({ posts: Array });
</script>

<template>
    <Head title="All Posts" />
    <div>
        <Navbar />
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>All Posts</h2>
                <Link :href="route('posts.create')" class="btn btn-primary"
                    >+ New Post</Link
                >
            </div>
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
