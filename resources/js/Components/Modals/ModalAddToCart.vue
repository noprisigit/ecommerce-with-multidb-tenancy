<script setup>
import { useForm } from '@inertiajs/vue3';
import { getCurrentInstance, onMounted, ref, watch } from 'vue';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import { toast } from 'vue3-toastify';
import eventBus from '../../eventBus';

const emits = defineEmits(['setCartItems']);

const props = defineProps({
    product: {
        type: Object,
        default: () => { }
    },
});

const form = useForm({});

const quantity = ref(1);
const totalPrice = ref(1);

watch(() => quantity.value, (value) => {
    totalPrice.value = value * props.product.price;
    form.quantity = value;
});

watch(() => props.product, () => {
    totalPrice.value = Number(props.product.price);
});

const handleReset = () => {
    quantity.value = 1;
    totalPrice.value = Number(props.product.price);
}

const handleSaveToCart = async () => {
    form
        .transform((data) => ({
            ...data,
            productId: props.product.id,
            quantity: quantity.value,
            price: props.product.price,
            totalPrice: totalPrice.value
        }))
        .post(route('carts.store'));

    handleReset();

    eventBus.emit('cart-updated');
}
</script>

<template>
    <div class="modal modal-blur fade" id="modalAddToCart" data-bs-keyboard="false" data-bs-backdrop="static"
        tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ product.name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-start gap-5">
                        <img :src="product.full_image_path" class="img-thumbnail" :alt="product.name">
                        <div>
                            <p class="mb-2 fw-bold">$ {{ product.price }}</p>
                            <p class="mb-0">{{ product.description }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start mt-4 gap-5">
                        <button class="btn btn-white" @click="quantity--" :class="{
                            disabled: quantity === 1
                        }">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" class="form-control w-25" min="0" v-model="quantity">
                        <button class="btn btn-white" @click="quantity++">
                            <i class="fas fa-plus"></i>
                        </button>

                    </div>
                    <p class="mt-3 mb-0">
                        Total Price : <strong>$ {{ Number(totalPrice) }}</strong>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal"
                        @click="handleReset">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="handleSaveToCart"
                        data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>
