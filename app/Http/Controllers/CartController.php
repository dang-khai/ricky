<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::query()->where('user_id', '=', auth()->id());

        return CartItem::query()->where('cart_id', $cart->first()['id'])->with(['product', 'product.image', 'product.subCategory.category'])->get();
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

        $cart = Cart::query()->where('user_id', '=', auth()->id());

        if (! $cart->exists()) {
            Cart::create([
                'user_id' => auth()->id(),
            ]);
        }
        $item = CartItem::query()
            ->where('cart_id', '=', $cart->first()['id'])
            ->where('product_id', '=', $request->input('product_id'));

        if (!$item->exists()) {
            CartItem::create([
                'cart_id' => $cart->first()['id'],
                ...$request->all()
            ]);

            return response()->json();
        }

        if ($item->first()['product_id'] === $request->input('product_id')) {
            $item->update([
                'quantity' => $item->first()['quantity'] + $request->input('quantity'),
            ]);

            return response()->json();
        }
        // if ($request->has('quantity')) {
        //     CartItem::create([
        //         'cart_id' => $cart->first()['id'],
        //         ...$request->all()
        //     ]);

        //     return response()->json();
        // }

        // CartItem::create([
        //     'cart_id' => auth()->id(),
        //     'product_id' => $request->input('product_id'),
        //     'quantity' => $quantity
        // ]);

        return response()->json();
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
}
