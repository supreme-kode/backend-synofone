<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //methode query builder
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('admin123')
        // ]);

        //method php native
        $user = new User;
        $user->username = 'admin';
        $user->email = 'admin@admin.comm';
        $user->password = bcrypt('admin123');
        $user->save();

        //method eloquent object relational mapper
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('admin123')
        // ]);
    }

}
