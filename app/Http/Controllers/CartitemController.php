<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;
use App\Models\Cart;

class CartitemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menambahkan data produk pada chart item
        $cartitem = Cartitem::with('product')->get();

        if ($cartitem->isEmpty())
        {
            return response()->json([
                'message' => 'Data ChartItem tidak ditemukan',
                'data' => []
            ],200);
        }
        else
        {
            return response()->json([
                'message' => 'Daftar ChartItem',
                'Data' => $cartitem
            ],200);
        }

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
        $request->validate([
            'cart_id' => 'required',
            'product_id' => 'required',
            'qty' => 'required'
        ]);

        $cartitem = new Cartitem;
        $cartitem->cart_id = $request->cart_id;
        $cartitem->product_id = $request->product_id;
        $cartitem->qty = $request->qty;
        $cartitem->save();

        return response()->json([
            'message' => 'Data Cart Item berhasil disimpan',
            'data' => $cartitem
        ],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cartitem = Cartitem::find($id);
        return response()->json([
            'message' => "Data Cart Item ke $id",
            'data' => $cartitem
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cartitem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cart_id' => 'required',
            'product_id' => 'required',
            'qty' => 'required'
        ]);

        $cartitem = Cartitem::find($id);
        $cartitem->cart_id = $request->cart_id;
        $cartitem->product_id = $request->product_id;
        $cartitem->qty = $request->qty;
        $cartitem->save();

        return response()->json([
            'message' => "Data Cart Item ke $id berhasil diubah",
            'data' => $cartitem
        ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartitem = Cartitem::find($id);
        $cartitem->delete();

        return response()->json([
            'message' => "Data Cart Item ke $id berhasil dihapus",
            'data' => $cartitem
        ],200);
    }

    public function userCart($id)
    {
        //mencari data cart berdasarkan id user
        $cart = Cart::where('user_id', $id)->first();
        $cart_id = $cart->id;
        //mencari data cartitem berdasarkan id cart
        $cartitem = Cartitem::where('cart_id', $cart_id)->get();
    }
}
