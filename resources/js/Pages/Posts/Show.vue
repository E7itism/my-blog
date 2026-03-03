<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

const props = defineProps({ post: Object });
const page = usePage();
const authUser = page.props.auth.user;
const commentForm = useForm({ body: "" });

const submitComment = () => {
    commentForm.post(route("comments.store", props.post.id), {
        onSuccess: () => commentForm.reset(),
    });
};
</script>

<template>
    <Head :title="post.title" />
    <div>
        <Navbar />
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div
                            class="card-header d-flex justify-content-between align-items-center"
                        >
                            <h4 class="mb-0">{{ post.title }}</h4>
                            <small class="text-muted"
                                >by {{ post.user.name }}</small
                            >
                        </div>
                        <div class="card-body">
                            <p class="card-text" style="white-space: pre-line">
                                {{ post.content }}
                            </p>
                        </div>
                        <div
                            class="card-footer"
                            v-if="authUser && authUser.id === post.user_id"
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

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                Comments ({{ post.comments.length }})
                            </h5>
                        </div>
                        <div class="card-body">
                            <div
                                v-if="post.comments.length === 0"
                                class="alert alert-info"
                            >
                                No comments yet. Be the first to comment!
                            </div>
                            <div
                                v-for="comment in post.comments"
                                :key="comment.id"
                                class="border-bottom py-3 d-flex justify-content-between align-items-start"
                            >
                                <div>
                                    <strong>{{ comment.user.name }}</strong>
                                    <p class="mb-0 mt-1">{{ comment.body }}</p>
                                </div>
                                <Link
                                    v-if="
                                        authUser &&
                                        authUser.id === comment.user_id
                                    "
                                    :href="
                                        route('comments.destroy', comment.id)
                                    "
                                    method="delete"
                                    as="button"
                                    class="btn btn-danger btn-sm"
                                    >Delete</Link
                                >
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4" v-if="authUser">
                        <div class="card-header">
                            <h5 class="mb-0">Leave a Comment</h5>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="submitComment">
                                <div class="form-group">
                                    <textarea
                                        v-model="commentForm.body"
                                        class="form-control"
                                        :class="{
                                            'is-invalid':
                                                commentForm.errors.body,
                                        }"
                                        rows="3"
                                        placeholder="Write a comment..."
                                    ></textarea>
                                    <div
                                        v-if="commentForm.errors.body"
                                        class="invalid-feedback"
                                    >
                                        {{ commentForm.errors.body }}
                                    </div>
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    :disabled="commentForm.processing"
                                >
                                    Post Comment
                                </button>
                            </form>
                        </div>
                    </div>
                    <div v-else class="alert alert-info">
                        <Link :href="route('login')">Login</Link> to leave a
                        comment.
                    </div>

                    <Link :href="route('home')" class="btn btn-secondary mb-4"
                        >← Back to Home</Link
                    >
                </div>
            </div>
        </div>
    </div>
</template>
