<script setup>
import CentralLayout from "@/Layouts/CentralLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <CentralLayout>
        <Head title="Dashboard" />

        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Dashboard
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <!-- Content here -->
            </div>
        </div>
    </CentralLayout>
</template>
