<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />
    <div
        class="min-vh-100 d-flex align-items-center justify-content-center bg-light"
    >
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-center bg-dark text-white">
                    <h4 class="mb-0">My Blog</h4>
                </div>
                <div class="card-body p-4">
                    <h5 class="card-title text-center mb-4">Create Account</h5>
                    <form @submit.prevent="submit">
                        <div class="form-group">
                            <label>Name</label>
                            <input
                                v-model="form.name"
                                type="text"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.name }"
                                required
                                autofocus
                            />
                            <div
                                v-if="form.errors.name"
                                class="invalid-feedback"
                            >
                                {{ form.errors.name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input
                                v-model="form.email"
                                type="email"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.email }"
                                required
                            />
                            <div
                                v-if="form.errors.email"
                                class="invalid-feedback"
                            >
                                {{ form.errors.email }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input
                                v-model="form.password"
                                type="password"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.password }"
                                required
                                autocomplete="new-password"
                            />
                            <div
                                v-if="form.errors.password"
                                class="invalid-feedback"
                            >
                                {{ form.errors.password }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input
                                v-model="form.password_confirmation"
                                type="password"
                                class="form-control"
                                :class="{
                                    'is-invalid':
                                        form.errors.password_confirmation,
                                }"
                                required
                                autocomplete="new-password"
                            />
                            <div
                                v-if="form.errors.password_confirmation"
                                class="invalid-feedback"
                            >
                                {{ form.errors.password_confirmation }}
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-between align-items-center mt-3"
                        >
                            <Link
                                :href="route('login')"
                                class="text-muted small"
                                >Already registered?</Link
                            >
                            <button
                                type="submit"
                                class="btn btn-dark"
                                :disabled="form.processing"
                            >
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
