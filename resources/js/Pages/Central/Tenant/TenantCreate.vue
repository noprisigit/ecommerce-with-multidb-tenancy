<script setup>
import CentralLayout from "@/Layouts/CentralLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { route } from "../../../../../vendor/tightenco/ziggy/src/js";

const form = useForm({
    name: null,
    address: null,
});

const handleSubmit = () => {
    form.post('/tenants', {
        preserveScroll: true,
    });
}

</script>

<template>
    <CentralLayout>

        <Head title="Create New Tenant" />

        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Create New Tenant
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form class="card" @submit.prevent="handleSubmit">
                    <div class="card-header">
                        <h3 class="card-title">Form Create New Tenant</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" v-model="form.name" id="name" class="form-control" :class="{
                                'is-invalid': form.errors.name
                            }" placeholder="Tenant Name">
                            <div class="invalid-feedback" v-if="form.errors.name">{{ form.errors.name }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" v-model="form.address" id="address" class="form-control" :class="{
                                'is-invalid': form.errors.address
                            }" placeholder="Tenant Address">
                            <div class="invalid-feedback" v-if="form.errors.address">{{ form.errors.address }}</div>
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
    </CentralLayout>
</template>
