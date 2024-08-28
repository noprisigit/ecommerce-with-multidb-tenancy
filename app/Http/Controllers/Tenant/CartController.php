<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItems = CartItem::query()
            ->with('product')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($cartItems);

        // return Inertia::render('Components/Dropdowns/CartDropdown', [
        //     'cartItems' => $cartItems
        // ]);
    }

    public function store(Request $request)
    {
        $validated = $request->only([
            'productId',
            'quantity',
            'price',
            'totalPrice'
        ]);

        $user = auth()->user();

        $cart = CartItem::query()
            ->where('user_id', $user->id)
            ->where('product_id', $validated['productId'])
            ->first();

        if (!$cart) {
            CartItem::query()->create([
                'user_id' => $user->id,
                'product_id' => $validated['productId'],
                'quantity' => $validated['quantity'],
                'price' => $validated['price'],
                'total_price' => $validated['totalPrice']
            ]);
        } else {
            $cart->update([
                'quantity' => $cart->quantity + $validated['quantity'],
                'total_price' => $cart->total_price + $validated['totalPrice']
            ]);
        }

        return redirect()->back()->with('success', 'Cart has been added');
    }

    public function destroy(CartItem $cart)
    {
        $cart->delete();

        return redirect()->back();
    }
}
