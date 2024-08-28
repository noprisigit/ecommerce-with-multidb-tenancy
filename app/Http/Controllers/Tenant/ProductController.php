<?php

namespace App\Http\Controllers\Tenant;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Product\CreateProductRequest;
use App\Http\Requests\Tenant\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role != RoleEnum::ADMINISTRATOR) {
            return abort(403);
        }

        $products = Product::query()->get();

        return Inertia::render('Tenant/Product/ProductIndex', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role != RoleEnum::ADMINISTRATOR) {
            return abort(403);
        }

        return Inertia::render('Tenant/Product/ProductCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        if (auth()->user()->role != RoleEnum::ADMINISTRATOR) {
            return abort(403);
        }

        $validated = $request->validated();

        if ($request->hasFile('image') && !empty($validated['image'])) {
            $image = $request->file('image');

            $filename = round(microtime(true) * 1000) . '-' . Str::uuid() . '.' . $image->getClientOriginalExtension();
            $filepath = $image->storeAs('uploads/products', $filename, 'public');
            $validated['image_path'] = $filepath;
        }

        Product::query()->create($validated);

        return to_route('products.index')->with('success', 'New product has been successfully created');
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
    public function edit(Product $product)
    {
        if (auth()->user()->role != RoleEnum::ADMINISTRATOR) {
            return abort(403);
        }

        return Inertia::render('Tenant/Product/ProductEdit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if (auth()->user()->role != RoleEnum::ADMINISTRATOR) {
            return abort(403);
        }

        $validated = $request->validated();

        if ($request->hasFile('image') && !empty($validated['image'])) {
            if (Storage::exists($product->image_path)) {
                Storage::delete($product->image_path);
            }

            $image = $request->file('image');

            $filename = round(microtime(true) * 1000) . '-' . Str::uuid() . '.' . $image->getClientOriginalExtension();
            $filepath = $image->storeAs('uploads/products', $filename, 'public');
            $validated['image_path'] = $filepath;
        }

        $product->update($validated);

        return to_route('products.index')->with('success', 'New product has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (auth()->user()->role != RoleEnum::ADMINISTRATOR) {
            return abort(403);
        }

        if (Storage::exists($product->image_path)) {
            Storage::delete($product->image_path);
        }

        $product->delete();

        return to_route('products.index')->with('success', 'Product has been successfully deleted');
    }
}
