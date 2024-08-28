<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
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
        $countTenants = Tenant::query()->count();
        $countUsers = User::query()->count();

        return Inertia::render('Central/Dashboard', [
            'countTenants' => $countTenants,
            'countUsers' => $countUsers
        ]);
    }
}
