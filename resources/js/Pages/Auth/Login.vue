<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';

const form = useForm({
    email: null,
    password: null,
    remember: false,
});

const handleSubmit = () => {
    form.post(route('login'), {
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
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form @submit.prevent="handleSubmit" method="get" autocomplete="off">
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
                                <!-- <span class="form-label-description">
                                    <a href="./forgot-password.html">I forgot password</a>
                                </span> -->
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
                            <label class="form-check">
                                <input type="checkbox" v-model="form.remember" class="form-check-input" />
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-secondary mt-3">
                Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
            </div>
        </div>
    </GuestLayout>
</template>
