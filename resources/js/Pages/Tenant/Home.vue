<script setup>
import TenantMainLayout from '@/Layouts/TenantMainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import ModalAddToCart from '../../Components/Modals/ModalAddToCart.vue';
import { onMounted, reactive, ref } from 'vue';

const props = defineProps({
    products: {
        type: Array,
        default: () => []
    },
    cartItems: {
        type: Array,
        default: () => []
    },
});

const product = ref({});

const setProduct = (value) => {
    product.value = value;
}
</script>

<template>
    <TenantMainLayout :cartItems="cartItems">

        <Head title="Home" />

        <div class="page-body">
            <div class="container-xl">
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
                            <div class="card-footer d-flex justify-content-end">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalAddToCart" @click="setProduct(product)">
                                    <i class="fas fa-plus"></i> Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ModalAddToCart :product="product" />

    </TenantMainLayout>
</template>
