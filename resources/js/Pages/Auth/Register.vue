<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';

const form = useForm({
    name: null,
    email: null,
    password: null,
    passwordConfirmation: null,
});

const handleSubmit = () => {
    form.post(route('register'), {
        onSuccess: () => form.reset('password')
    });
}

</script>

<template>
    <GuestLayout>
        <Head title="Login" />

        <div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Register your account</h2>
                    <form @submit.prevent="handleSubmit" method="get" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" v-model="form.name" class="form-control" :class="{
                                'is-invalid': form.errors.name
                            }" placeholder="Your name" autocomplete="off">
                            <div class="invalid-feedback" v-show="form.errors.name">{{ form.errors.name }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" v-model="form.email" class="form-control" :class="{
                                'is-invalid': form.errors.email
                            }" placeholder="your@email.com" autocomplete="off">
                            <div class="invalid-feedback" v-show="form.errors.email">{{ form.errors.email }}</div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" v-model="form.password" class="form-control" :class="{
                                    'is-invalid': form.errors.password
                                }" placeholder="Your password" autocomplete="off">
                                <div class="invalid-feedback" v-show="form.errors.password">{{ form.errors.password }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password Confirmation
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" v-model="form.passwordConfirmation" class="form-control" :class="{
                                    'is-invalid': form.errors.passwordConfirmation
                                }" placeholder="Your password confirmation" autocomplete="off">
                                <div class="invalid-feedback" v-show="form.errors.passwordConfirmation">{{ form.errors.passwordConfirmation }}
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-secondary mt-3">
                Already have account? <Link :href="route('login')" tabindex="-1">Sign In</Link>
            </div>
        </div>
    </GuestLayout>
</template>
