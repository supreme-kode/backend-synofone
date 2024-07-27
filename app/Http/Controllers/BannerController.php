<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        return response()->json([
            'message' => 'Berhasil menampilan data banner',
            'data' => $banner
        ],200);
    }

    public function store (Request $request)
    {
        $request->validate([
            'image'=>'required',
            'keterangan'=>'required',
        ]);

        $banner = new Banner;
        $banner->image = $request->image;
        $banner->keterangan = $request->keterangan;
        $banner->save();

        return response()->json([
            'message' => 'Banner berhasil ditambah',
            'keterangan' => $banner
        ],200);
    }

    public function update (Request $request, string $id)
    {
        $request->validate([
            'image' => 'required',
            'keterangan' => 'required'
        ]);

        //mencari data banner berdasarkan id dan ditampung ke dalam variable
        $banner = Banner::find($id);

        //proses update
        $banner->image = $request->image;
        $banner->keterangan = $request->keterangan;
        $banner->save();

        //memberikan respon ke pengguna
        return response()->json([
            'message' => 'Data berhasil di ganti',
            'data' => $banner
        ],200);
    }

    public function destroy(Request $request, string $id)
    {
        //mencari data banner berdasarkan id dan ditampung ke dalam variable
        $banner = Banner::find($id);

        //proses
        $banner->delete();

        //memberikan respon ke pengguna
        return response()->json([
            'message' => 'Data berhasil di hapus',
            'data' => $banner
        ],200);
    }

}