<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'first_name'=>'Admin',
            'last_name'=>'Admin',
            'username'=>'Admin',
            'email'=>'Admin@admin.com',
            'password'=>Hash::make('admin'),
            'isadmin'=>1,
        ]);
    }
}
