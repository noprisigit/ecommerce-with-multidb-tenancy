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
                    <a href="javascript:void(0)">
                        Ecommerce
                    </a>
                </div>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm">
                                <img :src="`https://ui-avatars.com/api/?name=${user.name}`" class="rounded" alt="User Image">
                            </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ user.name }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="javascript:void(0)" @click="handleLogout" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <div class="row flex-fill align-items-center">
                            <div class="col">
                                <ul class="navbar-nav">
                                    <li class="nav-item" :class="{
                                        active: route().current('dashboard')
                                    }">
                                        <Link :href="route('dashboard')" class="nav-link">
                                            <span
                                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                <i class="fas fa-home"></i>
                                            </span>
                                            <span class="nav-link-title">
                                                Dashboard
                                            </span>
                                        </Link>
                                    </li>
                                    <li class="nav-item" :class="{
                                        active: route().current('users*')
                                    }">
                                        <Link :href="route('users.index')" class="nav-link">
                                            <span
                                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                <i class="fas fa-users"></i>
                                            </span>
                                            <span class="nav-link-title">
                                                Users
                                            </span>
                                        </Link>
                                    </li>
                                    <li class="nav-item" :class="{
                                        active: route().current('customers*')
                                    }">
                                        <Link :href="route('customers.index')" class="nav-link">
                                            <span
                                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                <i class="fas fa-user-circle"></i>
                                            </span>
                                            <span class="nav-link-title">
                                                Customers
                                            </span>
                                        </Link>
                                    </li>
                                    <li class="nav-item" :class="{
                                        active: route().current('products*')
                                    }">
                                        <Link :href="route('products.index')" class="nav-link">
                                            <span
                                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                <i class="fab fa-product-hunt"></i>
                                            </span>
                                            <span class="nav-link-title">
                                                Products
                                            </span>
                                        </Link>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <!-- @inertia() -->
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

<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { route } from '../../../vendor/tightenco/ziggy/src/js';
import { computed, watch } from 'vue';
import { toast } from 'vue3-toastify';

const page = usePage();
const user = computed(() => page.props.user);
const form = useForm({});

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
