<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $products = Product::query()->get();
        $cartItems = [];

        if (auth()->check()) {
            $cartItems = CartItem::query()
                ->with('product')
                ->where('user_id', auth()->id())
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return Inertia::render('Tenant/Home', [
            'products' => $products,
            'cartItems' => $cartItems
        ]);
    }
}
