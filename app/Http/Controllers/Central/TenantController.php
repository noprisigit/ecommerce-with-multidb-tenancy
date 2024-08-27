<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::query()->get();

        return Inertia::render('Central/Tenant/TenantIndex', [
            'tenants' => $tenants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Central/Tenant/TenantCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255']
        ]);

        $tenant = Tenant::query()->create([
            'id' => str_replace(' ', '_', strtolower($validated['name'])),
            'name' => $validated['name'],
            'address' => $validated['address']
        ]);

        $tenant->domains()->create(['domain' => str_replace(' ', '-', strtolower($validated['name'])) . '.localhost']);

        return to_route('tenants.index')->with('success', 'New Tenant has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        return Inertia::render('Central/Tenant/TenantEdit', [
            'tenant' => $tenant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:tenants,data->name,' . $tenant->id],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $tenant->update($validated);

        return to_route('tenants.index')->with('success', 'Tenant has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $dbName = $tenant->id;
        $tenant->delete();

        DB::query('DROP DATABASE tenant_' . $dbName);

        return to_route('tenants.index')->with('success', 'Tenant has been deleted');
    }
}
