<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomizedUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => '',
                'password' => bcrypt('secret'),
                'name' => 'Admin',
                'tempat_lahir' => '',
                'tanggal_lahir' => NULL,
                'alamat' => '',
                'email' => 'admin@gmail.com',
                'no_tlp' => '',
                'email_verified_at' => NULL,
                'keterangan' => '',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'status' => 'aktif',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'petugasarsip@gmail.com',
                'password' => bcrypt('secret'),
                'name' => 'petugas arsip',
                'tempat_lahir' => NULL,
                'tanggal_lahir' => NULL,
                'alamat' => 'kp. babakan tipar kec.cisaaat kab.sukabumi',
                'email' => 'petugasarsip@gmail.com',
                'no_tlp' => '083134319414',
                'email_verified_at' => NULL,
                'keterangan' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-07-09 16:57:39',
                'updated_at' => '2021-07-09 16:57:39',
                'deleted_at' => NULL,
                'status' => 'aktif',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'sekertaris@gmail.com',
                'password' => bcrypt('secret'),
                'name' => 'sekertaris',
                'tempat_lahir' => NULL,
                'tanggal_lahir' => NULL,
                'alamat' => 'kp. babakan tipar kec.cisaaat kab.sukabumi',
                'email' => 'sekertaris@gmail.com',
                'no_tlp' => '083134319414',
                'email_verified_at' => NULL,
                'keterangan' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-07-09 16:58:22',
                'updated_at' => '2021-07-09 17:03:46',
                'deleted_at' => NULL,
                'status' => 'aktif',
            ),
        ));
        
        
    }
}