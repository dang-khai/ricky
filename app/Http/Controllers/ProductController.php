<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->with(['subCategory', 'subCategory.category', 'image'])->get();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $product = Product::create($input);

        if ($request->hasFile('url')) {
            $path = $request->file('url')->storePublicly('public/products');
            $url = str_replace('public/', '', $path);
            $product->image()->create(['url' => $url]);
        }

        return response()->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::query()->with(['image', 'subCategory', 'subCategory.category'])->findOrFail($id);

        return $product;
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
        $product = Product::findOrFail($request->input('id'));
        $product->update($request->all());

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $path = Product::find($id)->image()->first()->url;
        $product = Product::findOrFail($id)->delete();
        Image::query('image_id', $id)->delete();
        Storage::delete($path);


        return response()->json();
    }
}
