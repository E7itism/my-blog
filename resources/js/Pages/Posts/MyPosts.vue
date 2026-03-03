<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

const props = defineProps({ posts: Array });
</script>

<template>
    <Head title="My Posts" />
    <div>
        <Navbar />
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>My Posts</h2>
                <Link :href="route('posts.create')" class="btn btn-primary"
                    >+ New Post</Link
                >
            </div>
            <div v-if="posts.length === 0" class="alert alert-info">
                You haven't written any posts yet.
                <Link :href="route('posts.create')" class="alert-link"
                    >Write your first post!</Link
                >
            </div>
            <div v-for="post in posts" :key="post.id" class="card mb-4">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between align-items-center"
                    >
                        <h5 class="card-title">{{ post.title }}</h5>
                        <div>
                            <Link
                                :href="route('posts.show', post.id)"
                                class="btn btn-secondary btn-sm mr-2"
                                >View</Link
                            >
                            <Link
                                :href="route('posts.edit', post.id)"
                                class="btn btn-warning btn-sm mr-2"
                                >Edit</Link
                            >
                            <Link
                                :href="route('posts.destroy', post.id)"
                                method="delete"
                                as="button"
                                class="btn btn-danger btn-sm"
                                >Delete</Link
                            >
                        </div>
                    </div>
                    <p class="card-text mt-2">
                        {{ post.content.substring(0, 200) }}...
                    </p>
                    <small class="text-muted"
                        >{{ post.comments.length }} comments</small
                    >
                </div>
            </div>
        </div>
    </div>
</template>
