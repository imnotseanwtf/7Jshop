<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\InventoryPassword;
use App\Http\Requests\InventoryProductRequest;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $password = InventoryPassword::find(1);

        return view('inventory.index', compact('password'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $inventoryId = $id;
        return view('inventory.add', compact('inventoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $inventoryId = $id;
        $products = Product::where('user_id', $id)->get();
        return view('inventory.show', compact('products', 'inventoryId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changePassword(InventoryPassword $id)
    {
        $id->update([
            'password' => request('password'),
        ]);

        return redirect()->route('profile.show');
    }
    
    public function add(InventoryProductRequest $request)
    {
        $product = Product::create($request->except('product_image') + ['price' => 0, 'status' => 0]);

        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $image) {
                // Store the image in the public disk (storage/app/public)
                $path = $image->store('products', 'public');

                // Insert each image path with the corresponding product_id into the product_images table
                ProductImage::create([
                    'product_id' => $product->id,
                    // Change the path from 'public/products' to 'storage/products'
                    'image_path' => str_replace('public/', 'storage/', $path)
                ]);
            }
        }

        alert()->success('Product has been added');
        return redirect()->route('product.index');
    }
}
