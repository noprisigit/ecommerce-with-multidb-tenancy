<script setup>
import CentralLayout from "@/Layouts/CentralLayout.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <CentralLayout>
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
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Paweł Kuna</td>
                                    <td class="text-secondary">
                                        UI Designer, Training
                                    </td>
                                    <td class="text-secondary"><a href="#"
                                            class="text-reset">paweluna@howstuffworks.com</a></td>
                                    <td class="text-secondary">
                                        User
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jeffie Lewzey</td>
                                    <td class="text-secondary">
                                        Chemical Engineer, Support
                                    </td>
                                    <td class="text-secondary"><a href="#" class="text-reset">jlewzey1@seesaa.net</a>
                                    </td>
                                    <td class="text-secondary">
                                        Admin
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mallory Hulme</td>
                                    <td class="text-secondary">
                                        Geologist IV, Support
                                    </td>
                                    <td class="text-secondary"><a href="#"
                                            class="text-reset">mhulme2@domainmarket.com</a></td>
                                    <td class="text-secondary">
                                        User
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dunn Slane</td>
                                    <td class="text-secondary">
                                        Research Nurse, Sales
                                    </td>
                                    <td class="text-secondary"><a href="#" class="text-reset">dslane3@epa.gov</a></td>
                                    <td class="text-secondary">
                                        Owner
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Emmy Levet</td>
                                    <td class="text-secondary">
                                        VP Product Management, Accounting
                                    </td>
                                    <td class="text-secondary"><a href="#" class="text-reset">elevet4@senate.gov</a>
                                    </td>
                                    <td class="text-secondary">
                                        Admin
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Maryjo Lebarree</td>
                                    <td class="text-secondary">
                                        Civil Engineer, Product Management
                                    </td>
                                    <td class="text-secondary"><a href="#" class="text-reset">mlebarree5@unc.edu</a>
                                    </td>
                                    <td class="text-secondary">
                                        User
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Egan Poetz</td>
                                    <td class="text-secondary">
                                        Research Nurse, Engineering
                                    </td>
                                    <td class="text-secondary"><a href="#" class="text-reset">epoetz6@free.fr</a></td>
                                    <td class="text-secondary">
                                        Admin
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kellie Skingley</td>
                                    <td class="text-secondary">
                                        Teacher, Services
                                    </td>
                                    <td class="text-secondary"><a href="#"
                                            class="text-reset">kskingley7@columbia.edu</a></td>
                                    <td class="text-secondary">
                                        Owner
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </CentralLayout>
</template>
