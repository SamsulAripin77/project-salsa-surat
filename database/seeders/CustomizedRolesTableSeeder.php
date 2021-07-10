<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomizedRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Admin',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'sekertaris',
                'created_at' => '2021-07-09 16:55:19',
                'updated_at' => '2021-07-09 16:55:19',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'title' => 'petugas_arsip',
                'created_at' => '2021-07-09 16:56:53',
                'updated_at' => '2021-07-09 16:56:53',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}