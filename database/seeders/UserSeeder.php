<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'user1',
                'email' => 'user1@user.com',
                'password' => Hash::make('user123456'),
                'address' => 'jalan budi kemenangan 1',
                'gender'=> 'male',
                'dateOfBirth' => '2021-02-16',
                'role' => 'user'
            ],
            [
                'name' => 'user2',
                'email' => 'user2@user.com',
                'password' => Hash::make('user123456'),
                'address' => 'jalan budi kemenangan 2',
                'gender'=> 'male',
                'dateOfBirth' => '2021-02-16',
                'role' => 'user'
            ],
            [
                'name' => 'manager',
                'email' => 'manager@manager.com',
                'password' => Hash::make('manager123'),
                'address' => 'jalan budi kemenangan 3',
                'gender'=> 'male',
                'dateOfBirth' => '2021-02-16',
                'role' => 'manager'
            ],
        ]);
    }
}
