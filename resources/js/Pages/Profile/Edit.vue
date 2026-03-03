<script setup>
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

defineProps({
    mustVerifyEmail: { type: Boolean },
    status: { type: String },
});
</script>

<template>
    <Head title="Profile" />
    <div>
        <Navbar />
        <div class="container mt-4">
            <h2 class="mb-4">Profile</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Profile Information</h5>
                        </div>
                        <div class="card-body">
                            <UpdateProfileInformationForm
                                :must-verify-email="mustVerifyEmail"
                                :status="status"
                            />
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Update Password</h5>
                        </div>
                        <div class="card-body">
                            <UpdatePasswordForm />
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">Delete Account</h5>
                        </div>
                        <div class="card-body">
                            <DeleteUserForm />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
