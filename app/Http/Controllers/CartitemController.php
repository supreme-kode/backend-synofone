<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartitem;

class CartitemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartitem = Cartitem::all();
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
}
