<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hafid',
            'email' => 'do.crazy192@gmail.com',
            'password' => bcrypt("123")
        ]);
    }
}
