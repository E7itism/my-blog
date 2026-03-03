<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

const form = useForm({ title: "", content: "" });
const submit = () => {
    form.post(route("posts.store"));
};
</script>

<template>
    <Head title="Create Post" />
    <div>
        <Navbar />
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h4>Create New Post</h4></div>
                        <div class="card-body">
                            <form @submit.prevent="submit">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input
                                        v-model="form.title"
                                        type="text"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.title,
                                        }"
                                        placeholder="Enter title"
                                    />
                                    <div
                                        v-if="form.errors.title"
                                        class="invalid-feedback"
                                    >
                                        {{ form.errors.title }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea
                                        v-model="form.content"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.content,
                                        }"
                                        rows="6"
                                        placeholder="Write your post here..."
                                    ></textarea>
                                    <div
                                        v-if="form.errors.content"
                                        class="invalid-feedback"
                                    >
                                        {{ form.errors.content }}
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                        :disabled="form.processing"
                                    >
                                        Publish Post
                                    </button>
                                    <Link
                                        :href="route('posts.index')"
                                        class="btn btn-secondary"
                                        >Cancel</Link
                                    >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
