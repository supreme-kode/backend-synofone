<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        if ($order->isEmpty())
        {
            return  response()->json([
                'message' => 'Data order tidak ditemukan',
                'data' => []
            ],400);
        }
        else 
        {
            return response()->json([
                'message' => 'Data order dtemukan',
                'data'  =>  $order
            ],200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required',
            'alamat' => 'required',
            'metode_pengiriman' => 'required',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'image' => 'required'
        ]);

        $order = Order::create([
            'cart_id' => $request->cart_id,
            'alamat' => $request->alamat,
            'metode_pengiriman' => $request->metode_pengiriman,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
            'image' => $request->image
        ]);

        return response()->json([
            'message' => 'Data order berhasil disimpan',
            'data' => $order
        ],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        return response()->json([
            'message' => "Data order ke $id",
            'data' => $order
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
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
            'alamat' => 'required',
            'metode_pengiriman' => 'required',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'image' => 'required'
        ]);

        $order = Order::find($id);
        $order->cart_id = $request->cart_id;
        $order->alamat = $request->alamat;
        $order->metode_pengiriman = $request->metode_pengiriman;
        $order->metode_pembayaran = $request->metode_pembayaran;
        $order->status_pembayaran = $request->status_pembayaran;
        $order->image = $request->image;
        $order->save();

        return response()->json([
            'message' => "Data order ke $id berhasil diperbaharui",
            'data' => $order
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();

        return response()->json([
            'message' => "Data order ke $id berhasil di hapus",
            'data' => $order
        ],200);
    }
}
