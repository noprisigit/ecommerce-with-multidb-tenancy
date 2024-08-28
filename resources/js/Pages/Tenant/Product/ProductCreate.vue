<script setup>
import TenantLayout from "@/Layouts/TenantLayout.vue"
import { Head, useForm } from "@inertiajs/vue3";
import { route } from "../../../../../vendor/tightenco/ziggy/src/js";

const form = useForm({
    name: null,
    description: null,
    price: null,
    quantity: null,
    image: null,
});

const handleSubmit = () => {
    form.post(route('products.store'), {
        preserveScroll: true,
    });
}

</script>

<template>
    <TenantLayout>

        <Head title="Create New Product" />

        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Create New Product
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <form class="card" @submit.prevent="handleSubmit">
                            <div class="card-header">
                                <h3 class="card-title">Form Create New Product</h3>
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
                                    <label class="form-label" for="description">Description</label>
                                    <textarea v-model="form.description" class="form-control" :class="{
                                        'is-invalid': form.errors.description
                                    }" id="description" placeholder="Description"></textarea>
                                    <div class="invalid-feedback" v-if="form.errors.description">{{
                                        form.errors.description }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="price">Price ($)</label>
                                            <input type="number" v-model="form.price" id="price" class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.price
                                                }" placeholder="Price">
                                            <div class="invalid-feedback" v-if="form.errors.price">{{ form.errors.price
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="quantity">Quantity</label>
                                            <input type="number" min="0" v-model="form.quantity" id="quantity"
                                                class="form-control" :class="{
                                                    'is-invalid': form.errors.quantity
                                                }" placeholder="Quantity">
                                            <div class="invalid-feedback" v-if="form.errors.quantity">{{
                                                form.errors.quantity }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" @input="form.image = $event.target.files[0]" id="image"
                                        class="form-control" :class="{
                                            'is-invalid': form.errors.image
                                        }">
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                    <div class="invalid-feedback" v-if="form.errors.image">{{ form.errors.image }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </TenantLayout>
</template>
