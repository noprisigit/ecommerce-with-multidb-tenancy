<template>
    <div class="d-flex flex-column">
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="text-center mb-4">
                    <Link :href="route('home')" class="navbar-brand navbar-brand-autodark">
                        <h1 class="text-primary mb-0">Ecommerce</h1>
                    </Link>
                </div>

                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { watch } from 'vue';
import { toast } from 'vue3-toastify';

const page = usePage();

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
</script>
