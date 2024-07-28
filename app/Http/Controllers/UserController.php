<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        if($user->isEmpty())
        {
            return response()->json([
                'message' => 'Tidak terdapat data user',
                'data' => []
            ],400);
        }
        else 
        {
            return response()->json([
                'message' => 'Daftar user',
                'data' => $user
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
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            'message' => 'Data user berhasil ditambah',
            'data' => $user
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json([
            'message' => "Data user ke $id ditemukan",
            'data' => $user
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);
        if ($request->password != $request->password_confirmation) {
            return response()->json([
                'status' => 'Password Tidak Sama'
            ], 400);
        }
        else 
        {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->password_confirmation = $request->password_confirmation;
            $user->save();
        }
        return response()->json([
            'message' => "Data user dengan id $id berhasil diubah",
            'data' => $user
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user)
        {
            return response()->json([
                'message' => 'Data user tidak ditemukan'
            ],400);
        }
        $user->delete();
    }
}
