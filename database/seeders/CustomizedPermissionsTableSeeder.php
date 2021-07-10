<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomizedPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'user_management_access',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'permission_create',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'permission_edit',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'permission_show',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'permission_delete',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'permission_access',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'role_create',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'role_edit',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'role_show',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'role_delete',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'role_access',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'user_create',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'user_edit',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'user_show',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'user_delete',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'user_access',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'audit_log_show',
                'created_at' => NULL,
                'updated_at' => '2021-07-09 16:50:20',
                'deleted_at' => '2021-07-09 16:50:20',
            ),
            17 => 
            array (
                'id' => 18,
                'title' => 'audit_log_access',
                'created_at' => NULL,
                'updated_at' => '2021-07-09 16:50:20',
                'deleted_at' => '2021-07-09 16:50:20',
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'user_alert_create',
                'created_at' => NULL,
                'updated_at' => '2021-07-09 16:50:20',
                'deleted_at' => '2021-07-09 16:50:20',
            ),
            19 => 
            array (
                'id' => 20,
                'title' => 'user_alert_show',
                'created_at' => NULL,
                'updated_at' => '2021-07-09 16:50:20',
                'deleted_at' => '2021-07-09 16:50:20',
            ),
            20 => 
            array (
                'id' => 21,
                'title' => 'user_alert_delete',
                'created_at' => NULL,
                'updated_at' => '2021-07-09 16:50:20',
                'deleted_at' => '2021-07-09 16:50:20',
            ),
            21 => 
            array (
                'id' => 22,
                'title' => 'user_alert_access',
                'created_at' => NULL,
                'updated_at' => '2021-07-09 16:50:20',
                'deleted_at' => '2021-07-09 16:50:20',
            ),
            22 => 
            array (
                'id' => 23,
                'title' => 'master_access',
                'created_at' => NULL,
                'updated_at' => '2021-07-09 16:50:20',
                'deleted_at' => '2021-07-09 16:50:20',
            ),
            23 => 
            array (
                'id' => 61,
                'title' => 'laporan_access',
                'created_at' => NULL,
                'updated_at' => '2021-07-09 16:50:20',
                'deleted_at' => '2021-07-09 16:50:20',
            ),
            24 => 
            array (
                'id' => 102,
                'title' => 'profile_password_edit',
                'created_at' => NULL,
                'updated_at' => '2021-07-09 16:50:20',
                'deleted_at' => '2021-07-09 16:50:20',
            ),
            25 => 
            array (
                'id' => 103,
                'title' => 'surat_access',
                'created_at' => '2021-07-09 16:51:29',
                'updated_at' => '2021-07-09 16:51:29',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 104,
                'title' => 'surat_show',
                'created_at' => '2021-07-09 16:51:42',
                'updated_at' => '2021-07-09 16:51:42',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 105,
                'title' => 'surat_edit',
                'created_at' => '2021-07-09 16:51:54',
                'updated_at' => '2021-07-09 16:51:54',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 106,
                'title' => 'surat_create',
                'created_at' => '2021-07-09 16:52:09',
                'updated_at' => '2021-07-09 16:52:09',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 107,
                'title' => 'surat_delete',
                'created_at' => '2021-07-09 16:52:19',
                'updated_at' => '2021-07-09 16:52:19',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 108,
                'title' => 'pengarahan_access',
                'created_at' => '2021-07-09 16:52:41',
                'updated_at' => '2021-07-09 16:52:41',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 109,
                'title' => 'pengarahan_edit',
                'created_at' => '2021-07-09 16:52:49',
                'updated_at' => '2021-07-09 16:52:49',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 110,
                'title' => 'pengarahan_show',
                'created_at' => '2021-07-09 16:53:02',
                'updated_at' => '2021-07-09 16:53:02',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 111,
                'title' => 'pengarahan_edit_petugas_arsip',
                'created_at' => '2021-07-09 16:53:24',
                'updated_at' => '2021-07-09 16:53:24',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 112,
                'title' => 'pengarahan_edit_sekertaris',
                'created_at' => '2021-07-09 16:53:36',
                'updated_at' => '2021-07-09 16:53:36',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 113,
                'title' => 'surat_laporan',
                'created_at' => '2021-07-09 16:53:48',
                'updated_at' => '2021-07-09 16:53:48',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 114,
                'title' => 'kode_surat_access',
                'created_at' => '2021-07-09 16:54:17',
                'updated_at' => '2021-07-09 16:54:17',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}