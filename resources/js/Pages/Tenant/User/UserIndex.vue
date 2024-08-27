<script setup>
import TenantLayout from "@/Layouts/TenantLayout.vue"
import { Head, Link, useForm } from "@inertiajs/vue3";
import { route } from "../../../../../vendor/tightenco/ziggy/src/js";

defineProps({
    users: {
        type: Array,
        default: () => []
    },
});

const form = useForm({});

const handleDelete = (id) => {
    if (confirm('Are you sure to delete this user')) {
        form.delete(route('users.destroy', id));
    }
}
</script>

<template>
    <TenantLayout>

        <Head title="Create New User" />

        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Users Management
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <Link :href="route('users.create')" class="btn btn-primary mb-3">
                    <i class="fas fa-plus me-2"></i>
                    Create New User
                </Link>
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
                                <template v-if="users.length < 1">
                                    <tr>
                                        <td colspan="5" class="text-danger text-center">No Data Found</td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr v-for="(user, index) in users">
                                        <td>{{ ++index }}</td>
                                        <td class="text-secondary">
                                            {{ user.id }}
                                        </td>
                                        <td class="text-secondary">
                                            {{ user.name }}
                                        </td>
                                        <td class="text-secondary">
                                            {{ user.email }}
                                        </td>
                                        <td>
                                            <Link :href="`users/${user.id}/edit`">Edit</Link>
                                            <a href="javascript:void(0)" class="text-danger ms-2" @click="handleDelete(user.id)">
                                                Delete
                                            </a>
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
