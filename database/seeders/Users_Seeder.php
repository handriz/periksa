<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Users_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'HZ',
            'email' => 'admin@periksa.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'is_active' => 1,
        ]);
    }
}
