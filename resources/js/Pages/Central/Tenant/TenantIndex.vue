<script setup>
import CentralLayout from "@/Layouts/CentralLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    tenants: {
        type: Array,
        default: () => []
    },
})
</script>

<template>
    <CentralLayout>
        <Head title="Tenants Management" />

        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Tenants Management
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <Link :href="route('tenants.create')" class="btn btn-primary mb-3">
                    <i class="fas fa-plus me-2"></i>
                    Create New Tenant
                </Link>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="tenants.length < 1">
                                    <tr>
                                        <td colspan="5" class="text-danger text-center">No Data Found</td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr v-for="(tenant, index) in tenants">
                                        <td>{{ ++index }}</td>
                                        <td class="text-secondary">
                                            {{ tenant.id }}
                                        </td>
                                        <td class="text-secondary">
                                            {{ tenant.name }}
                                        </td>
                                        <td class="text-secondary">
                                            {{ tenant.address }}
                                        </td>
                                        <td>
                                            <a href="#">Edit</a>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </CentralLayout>
</template>
