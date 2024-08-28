<?php

namespace App\Http\Controllers\Tenant;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (auth()->user()->role != RoleEnum::ADMINISTRATOR) {
            return abort(403);
        }

        $countUsers = User::query()
            ->where('role', RoleEnum::ADMINISTRATOR)
            ->count();

        $countCustomers = User::query()
            ->where('role', RoleEnum::CUSTOMER)
            ->count();

        $countProducts = Product::query()->count();

        return Inertia::render('Tenant/Dashboard', [
            'countUsers' => $countUsers,
            'countCustomers' => $countCustomers,
            'countProducts' => $countProducts,
            'tenantName' => tenant('name')
        ]);
    }
}
