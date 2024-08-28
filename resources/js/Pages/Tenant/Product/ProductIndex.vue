<script setup>
import TenantLayout from "@/Layouts/TenantLayout.vue"
import { Head, Link, useForm } from "@inertiajs/vue3";
import { route } from "../../../../../vendor/tightenco/ziggy/src/js";

const form = useForm({});

defineProps({
    products: {
        type: Array,
        default: () => []
    }
});

const handleDelete = (id) => {
    if (confirm('Are you sure to delete this product')) {
        form.delete(route('products.destroy', id));
    }
}

</script>

<template>
    <TenantLayout>

        <Head title="Products Management" />

        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Products Management
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <Link :href="route('products.create')" class="btn btn-primary mb-3">
                <i class="fas fa-plus me-2"></i>
                Create New Product
                </Link>
                <template v-if="products.length < 1">
                    <div class="bg-white rounded shadow text-center py-5">
                        <p class="text-danger mb-0">Product Not Found</p>
                    </div>
                </template>
                <template v-else>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-3" v-for="product in products" :key="product.id">
                            <div class="card">
                                <!-- Photo -->
                                <div class="card-img-top p-5 text-center">
                                    <img :src="product.full_image_path" :alt="product.name" height="150">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p>$ {{ product.price }}</p>
                                        <p>{{ product.quantity }}</p>
                                    </div>
                                    <h3 class="card-title">{{ product.name }}</h3>
                                    <p class="text-secondary">
                                        {{ product.description }}
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <Link :href="route('products.edit', product.id)">
                                    Edit
                                    </Link>
                                    <a href="javascript:void(0)" @click="handleDelete(product.id)" class="text-danger">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </TenantLayout>
</template>
