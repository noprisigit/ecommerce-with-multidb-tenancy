<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { computed, onMounted, ref, watch } from 'vue';
import { toast } from 'vue3-toastify';
import { route } from '../../../vendor/tightenco/ziggy/src/js';
import CartDropdown from '../Components/Dropdowns/CartDropdown.vue';

const props = defineProps({
    cartItems: {
        type: Array,
        default: () => []
    }
});

const page = usePage();
const form = useForm({});
const user = computed(() => page.props.user);
const cartItems = ref([]);

watch(() => page.props.flash, () => {
    if (page.props.flash.success) {
        toast(page.props.flash.success, {
            type: 'success',
        });
    }

    if (page.props.flash.error) {
        toast(page.props.flash.error, {
            type: 'error'
        });
    }
}, { deep: true, immediate: true });

const handleLogout = () => {
    form.post(route('logout'));
}
</script>

<template>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <Link :href="route('home')">
                    Ecommerce
                    </Link>
                </div>
                <div class="navbar-nav flex-row order-md-last">
                    <CartDropdown :cartItems="cartItems" />

                    <div class="nav-item dropdown">
                        <template v-if="user">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                aria-label="Open user menu">
                                <span class="avatar avatar-sm">
                                    <img :src="`https://ui-avatars.com/api/?name=${user.name}`" class="rounded"
                                        alt="User Image">
                                </span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{ user.name }}</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="javascript:void(0)" @click="handleLogout" class="dropdown-item">Logout</a>
                            </div>
                        </template>
                        <template v-else>
                            <div class="d-flex">
                                <Link :href="route('login')" class="btn btn-primary">
                                Login
                                </Link>
                                <Link :href="route('register')" class="btn btn-white ms-2">
                                Sign Up
                                </Link>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <Link class="nav-link" :href="route('home')">
                                <span class="nav-link-title">
                                    Home
                                </span>
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">

            <slot />

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2024
                                    <a href="." class="link-secondary">Ecommerce with Multi DB and Multi Tenancy</a>.
                                    All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript:void(0)" class="link-secondary" rel="noopener">
                                        v1.0.0-beta20
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>
