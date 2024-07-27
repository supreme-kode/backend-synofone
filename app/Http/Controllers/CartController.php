<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::all();
        if($cart->isEmpty())
        {
            return response()->json([
                'message' => 'Data cart tidak ditemukan',
                'data' => []
            ],200);
        }
        else
        {
            return response()->json([
                'message' => 'Berikut data cart',
                'data' => $cart
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
            'user_id' => 'required',
            'status' => 'required'
        ]);

        $cart = Cart::create([
            'user_id' => $request->user_id,
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Data cart berhasil disimpan',
            'data' => $cart
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cart = Cart::find($id);
        return response()->json([
            'message' => "Data Cart ke $id",
            'data' => $cart
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'status' => 'required'
        ]);

        $cart = Cart::find($id);
        $cart->user_id = $request->user_id;
        $cart->status = $request->status;

        return response()->json([
            'message' => "Data Cart ke $id berhasil di update",
            'data' => $cart
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return response()->json([
            'message' => "Data Cart ke $id berhasil di hapus",
            'data'  => $cart
        ],200);
    }
}
