<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: { type: Boolean },
    status: { type: String },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />
    <div
        class="min-vh-100 d-flex align-items-center justify-content-center bg-light"
    >
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-center bg-dark text-white">
                    <h4 class="mb-0">
                        Ingco<span class="text-danger">Blog</span>
                    </h4>
                </div>
                <div class="card-body p-4">
                    <h5 class="card-title text-center mb-4">Login</h5>
                    <div v-if="status" class="alert alert-success">
                        {{ status }}
                    </div>
                    <form @submit.prevent="submit">
                        <div class="form-group">
                            <label>Email</label>
                            <input
                                v-model="form.email"
                                type="email"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.email }"
                                required
                                autofocus
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
                            />
                            <div
                                v-if="form.errors.password"
                                class="invalid-feedback"
                            >
                                {{ form.errors.password }}
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input
                                v-model="form.remember"
                                type="checkbox"
                                class="form-check-input"
                                id="remember"
                            />
                            <label class="form-check-label" for="remember"
                                >Remember me</label
                            >
                        </div>
                        <div
                            class="d-flex justify-content-between align-items-center"
                        >
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="text-muted small"
                                >Forgot your password?</Link
                            >
                            <button
                                type="submit"
                                class="btn btn-dark"
                                :disabled="form.processing"
                            >
                                Log in
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small
                        >Don't have an account?
                        <Link
                            :href="route('register')"
                            class="text-dark font-weight-bold"
                            >Register</Link
                        ></small
                    >
                </div>
            </div>
        </div>
    </div>
</template>
