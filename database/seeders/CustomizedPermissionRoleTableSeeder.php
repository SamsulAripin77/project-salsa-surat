<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomizedPermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'permission_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 1,
                'permission_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 1,
                'permission_id' => 3,
            ),
            3 => 
            array (
                'role_id' => 1,
                'permission_id' => 4,
            ),
            4 => 
            array (
                'role_id' => 1,
                'permission_id' => 5,
            ),
            5 => 
            array (
                'role_id' => 1,
                'permission_id' => 6,
            ),
            6 => 
            array (
                'role_id' => 1,
                'permission_id' => 7,
            ),
            7 => 
            array (
                'role_id' => 1,
                'permission_id' => 8,
            ),
            8 => 
            array (
                'role_id' => 1,
                'permission_id' => 9,
            ),
            9 => 
            array (
                'role_id' => 1,
                'permission_id' => 10,
            ),
            10 => 
            array (
                'role_id' => 1,
                'permission_id' => 11,
            ),
            11 => 
            array (
                'role_id' => 1,
                'permission_id' => 12,
            ),
            12 => 
            array (
                'role_id' => 1,
                'permission_id' => 13,
            ),
            13 => 
            array (
                'role_id' => 1,
                'permission_id' => 14,
            ),
            14 => 
            array (
                'role_id' => 1,
                'permission_id' => 15,
            ),
            15 => 
            array (
                'role_id' => 1,
                'permission_id' => 16,
            ),
            16 => 
            array (
                'role_id' => 1,
                'permission_id' => 17,
            ),
            17 => 
            array (
                'role_id' => 1,
                'permission_id' => 18,
            ),
            18 => 
            array (
                'role_id' => 1,
                'permission_id' => 19,
            ),
            19 => 
            array (
                'role_id' => 1,
                'permission_id' => 20,
            ),
            20 => 
            array (
                'role_id' => 1,
                'permission_id' => 21,
            ),
            21 => 
            array (
                'role_id' => 1,
                'permission_id' => 22,
            ),
            22 => 
            array (
                'role_id' => 1,
                'permission_id' => 23,
            ),
            23 => 
            array (
                'role_id' => 1,
                'permission_id' => 61,
            ),
            24 => 
            array (
                'role_id' => 1,
                'permission_id' => 102,
            ),
            25 => 
            array (
                'role_id' => 3,
                'permission_id' => 108,
            ),
            26 => 
            array (
                'role_id' => 3,
                'permission_id' => 109,
            ),
            27 => 
            array (
                'role_id' => 3,
                'permission_id' => 110,
            ),
            28 => 
            array (
                'role_id' => 3,
                'permission_id' => 112,
            ),
            29 => 
            array (
                'role_id' => 3,
                'permission_id' => 113,
            ),
            30 => 
            array (
                'role_id' => 4,
                'permission_id' => 103,
            ),
            31 => 
            array (
                'role_id' => 4,
                'permission_id' => 104,
            ),
            32 => 
            array (
                'role_id' => 4,
                'permission_id' => 105,
            ),
            33 => 
            array (
                'role_id' => 4,
                'permission_id' => 106,
            ),
            34 => 
            array (
                'role_id' => 4,
                'permission_id' => 107,
            ),
            35 => 
            array (
                'role_id' => 4,
                'permission_id' => 108,
            ),
            36 => 
            array (
                'role_id' => 4,
                'permission_id' => 109,
            ),
            37 => 
            array (
                'role_id' => 4,
                'permission_id' => 110,
            ),
            38 => 
            array (
                'role_id' => 4,
                'permission_id' => 111,
            ),
            39 => 
            array (
                'role_id' => 4,
                'permission_id' => 113,
            ),
            40 => 
            array (
                'role_id' => 4,
                'permission_id' => 114,
            ),
        ));
        
        
    }
}