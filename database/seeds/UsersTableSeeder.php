<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@stockx.com',
            'password' => Hash::make('123456'),
            'is_active' => 1,
            'user_type' =>99,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
