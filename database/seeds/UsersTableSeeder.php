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
            'name' => 'Admin Admin',
            'email' => 'admin@email.com',
            'type' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $frontEndContent = view('demo.frontend');

        DB::table('settings')->insert([
            'key' => 'front_content',
            'value' => $frontEndContent
        ]);
    }
}
