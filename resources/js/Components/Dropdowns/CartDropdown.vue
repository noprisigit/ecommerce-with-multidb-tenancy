<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import { getCurrentInstance, onMounted, onUnmounted, ref, watch } from 'vue';
import axios from 'axios';
import eventBus from '../../eventBus';

const props = defineProps({
    cartItems: {
        type: Array,
        default: () => []
    },
});

const form = useForm({});
const cartItems = ref([]);

const getCartItems = async () => {
    const res = await axios.get(route('carts.index'));
    const data = res.data;

    cartItems.value = data;
}

const handleDeleteCart = async (cartId) => {
    form.delete(route('carts.destroy', cartId));

    await getCartItems();
}

const onCartUpdated = () => {
  getCartItems();
};

onMounted(async () => {
    await getCartItems();

    eventBus.on('cart-updated', onCartUpdated);
});

onUnmounted(() => {
    eventBus.off('cart-updated', onCartUpdated)
})
</script>

<template>
    <div class="nav-item dropdown d-none d-md-flex me-3">
        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Shopping Cart">
            <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
            <i class="fas fa-shopping-cart"></i>
            <span class="badge bg-red" v-show="cartItems && cartItems.length > 0"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card" style="width: 25rem;">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Your shopping carts</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                    <template v-if="cartItems && cartItems.length > 0">
                        <div class="list-group-item" v-for="cart in cartItems" :key="cart.id">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img :src="cart.product.full_image_path" width="48" class="rounded" alt="">
                                </div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">{{ cart.product.name }}</a>
                                    <div class="d-block text-dark fw-bold text-truncate mt-n1">
                                        {{ cart.quantity }} x $ {{ cart.price }} = $ {{ cart.total_price
                                        }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="javascript:void(0)" @click="handleDeleteCart(cart.id)"
                                        class="list-group-item-actions me-2">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="list-group-item">
                            <p class="mb-0 text-danger text-center">Your shopping cart is empty</p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>
