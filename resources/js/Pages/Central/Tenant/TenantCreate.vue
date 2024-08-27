<script setup>
import CentralLayout from "@/Layouts/CentralLayout.vue";
</script>

<template>
    <CentralLayout>
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
                <form class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Bio</label>
                            <textarea class="form-control"
                                rows="5">Big belly rude boy, million dollar hustler. Unemployed.</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email-Address</label>
                            <input class="form-control" placeholder="your-email@domain.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" value="password">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="#" class="btn btn-primary">
                            Save
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </CentralLayout>
</template>
