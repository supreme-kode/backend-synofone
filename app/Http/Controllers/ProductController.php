<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        if($product->isEmpty())
        {
            return response()->json([
                'message' => 'Tidak terdapat produk',
                'data' => []
            ],400);
        }
        else 
        {
            return response()->json([
                'message' => 'Daftar Produk',
                'data' => $product
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
            'title' => 'required',
            'image' => 'required',
            'spesifikasi' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'warna' => 'required',
        ]);

        $product = Product::create([
            'image' => $request->image,
            'title' => $request->title,
            'spesifikasi' => $request->spesifikasi,
            'price' => $request->price,
            'qty' => $request->qty,
            'warna' => $request->warna         
        ]);

        return response()->json([
            'message' => 'Data product berhasil ditambahkan',
            'data' => $product
        ],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //mengabil data produk untuk ditampikan 
        $product = Product::find($id);
        return response()->json([
            'message' => "Data produk ke $id",
            'data' => $product
        ],200);
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
        $request -> validate([
            'title' => 'required',
            'image' => 'required',
            'spesifikasi' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'warna' => 'required',
        ]);

        //menentukan produk yang akan diganti dari table product menggunakan argumen $id
        $product = Product::find($id);

        //proses update berdasarkan data request
        $product->title = $request->title;
        $product->image = $request->image;
        $product->spesifikasi = $request->spesifikasi;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->warna = $request->warna;
        $product->save();

        //memberikan respon
        return response()->json([
            'message' => "Data product ke $id berhasil diubah",
            'data' => $product
        ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //cari produk yang akan dihapus dengan menggunakan id
        $product = Product::find($id);

        //proses menghapus data
        $product->delete();

        //memberikan respon ke pengguna
        return response()->json([
            'message' => 'Data berhasil dihapus',
            'data' => $product
        ]);
    }
}
