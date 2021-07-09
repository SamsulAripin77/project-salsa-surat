<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@gmail.com',
                'password'       => bcrypt('secret'),
                'remember_token' => null,
                'username'       => '',
                'alamat'         => '',
                'keterangan'     => '',
                'no_tlp'         => '',
                'tempat_lahir'   => '',
            ],
        ];

        User::insert($users);
    }
}
