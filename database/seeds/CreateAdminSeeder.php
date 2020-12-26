<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'name' => 'Admin',
	        'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@123'),
            'remember_token' => str_random(100),
        ] );
    }
}
