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
    public function show(User $user)
    {
        //
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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
