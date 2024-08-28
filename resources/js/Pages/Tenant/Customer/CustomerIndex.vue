<script setup>
import TenantLayout from "@/Layouts/TenantLayout.vue"
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    customers: {
        type: Array,
        default: () => []
    }
});

</script>

<template>
    <TenantLayout>
        <Head title="Customers Management" />

        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Customers Management
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="customers.length < 1">
                                    <tr>
                                        <td colspan="5" class="text-danger text-center">No Data Found</td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr v-for="(customer, index) in customers">
                                        <td>{{ ++index }}</td>
                                        <td class="text-secondary">
                                            {{ customer.id }}
                                        </td>
                                        <td class="text-secondary">
                                            {{ customer.name }}
                                        </td>
                                        <td class="text-secondary">
                                            {{ customer.email }}
                                        </td>
                                        <td>
                                            <Link :href="`customers/${customer.id}`">Detail</Link>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </TenantLayout>
</template>
