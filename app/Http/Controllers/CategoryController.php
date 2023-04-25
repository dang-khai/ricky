<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->with(['subCategory.image', 'image'])->get();

        return response()->json($categories);
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
        $path = null;

        $category = Category::create($request->all());

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/categories');
            $url = str_replace('public/', '', $path);
            $category->image()->create(['url' => $url]);
        }

        return response()->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with('subCategory')->findOrFail($id);

        return $category;
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
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $path = Category::find($id)->image->first()->url;
        Category::findOrFail($id)->delete();
        Image::query('image_id', $id)->delete();
        Storage::delete($path);

        return response()->json(null);
    }
}
