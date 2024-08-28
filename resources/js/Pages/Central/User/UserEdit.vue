<script setup>
import CentralLayout from "@/Layouts/CentralLayout.vue"
import { Head, useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { route } from "../../../../../vendor/tightenco/ziggy/src/js";

const props = defineProps({
    user: {
        type: Object,
        default: () => {}
    }
})

const form = useForm({
    id: null,
    name: null,
    email: null,
    password: null,
    passwordConfirmation: null,
});

const handleSubmit = () => {
    form.put(route('users.update', form.id), {
        preserveScroll: true
    });
}

onMounted(() => {
    if (props.user) {
        form.id = props.user.id;
        form.name = props.user.name;
        form.email = props.user.email;
    }
})
</script>

<template>
    <CentralLayout>

        <Head title="Create New User" />

        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Create New User
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <form class="card" @submit.prevent="handleSubmit">
                            <div class="card-header">
                                <h3 class="card-title">Form Create New User</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" v-model="form.name" id="name" class="form-control" :class="{
                                        'is-invalid': form.errors.name
                                    }" placeholder="Name">
                                    <div class="invalid-feedback" v-if="form.errors.name">{{ form.errors.name }}</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" v-model="form.email" id="email" class="form-control" :class="{
                                        'is-invalid': form.errors.email
                                    }" placeholder="Email">
                                    <div class="invalid-feedback" v-if="form.errors.email">{{ form.errors.email }}</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" v-model="form.password" id="password" class="form-control" :class="{
                                        'is-invalid': form.errors.password
                                    }" placeholder="Password">
                                    <div class="invalid-feedback" v-if="form.errors.password">{{ form.errors.password }}</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="passwordConfirmation">Password Confirmation</label>
                                    <input type="password" v-model="form.passwordConfirmation" id="passwordConfirmation" class="form-control" :class="{
                                        'is-invalid': form.errors.passwordConfirmation
                                    }" placeholder="Password Confirmation">
                                    <div class="invalid-feedback" v-if="form.errors.passwordConfirmation">{{ form.errors.passwordConfirmation }}</div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </CentralLayout>
</template>
