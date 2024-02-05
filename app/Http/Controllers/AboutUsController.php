<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\TopCustomer;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();
        $products = Product::with('productImages', 'user')->where('status', 1)->get();
        $mainProducts = Product::with('productImages','user')->where('status', 2)->get();
        $activeProduct = Product::with('productImages','user')->where('status', 3)->first();
        $topCustomers = TopCustomer::all();

        return view('welcome', compact('aboutUs', 'products', 'mainProducts', 'activeProduct', 'topCustomers'));
    }

    public function create()
    {
        $aboutUs = AboutUs::first();

        return view('about', compact('aboutUs'));
    }

    public function update(UpdateAboutUsRequest $request, AboutUs $aboutUs)
    {
        $updateData = $request->validated(); // Use validated data

        if ($request->hasFile('image')) {
            $updateData['image'] = $request->file('image')->store('aboutUs', 'public');
        }

        $aboutUs->update($updateData);

        return redirect()->route('about.create');
    }


}
