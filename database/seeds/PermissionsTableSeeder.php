<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'master_access',
            ],
            [
                'id'    => 24,
                'title' => 'jabatan_create',
            ],
            [
                'id'    => 25,
                'title' => 'jabatan_edit',
            ],
            [
                'id'    => 26,
                'title' => 'jabatan_show',
            ],
            [
                'id'    => 27,
                'title' => 'jabatan_delete',
            ],
            [
                'id'    => 28,
                'title' => 'jabatan_access',
            ],
            [
                'id'    => 29,
                'title' => 'set_presensi_access',
            ],
            [
                'id'    => 30,
                'title' => 'shift_create',
            ],
            [
                'id'    => 31,
                'title' => 'shift_edit',
            ],
            [
                'id'    => 32,
                'title' => 'shift_show',
            ],
            [
                'id'    => 33,
                'title' => 'shift_delete',
            ],
            [
                'id'    => 34,
                'title' => 'shift_access',
            ],
            [
                'id'    => 35,
                'title' => 'jadwal_create',
            ],
            [
                'id'    => 36,
                'title' => 'jadwal_edit',
            ],
            [
                'id'    => 37,
                'title' => 'jadwal_show',
            ],
            [
                'id'    => 38,
                'title' => 'jadwal_delete',
            ],
            [
                'id'    => 39,
                'title' => 'jadwal_access',
            ],
            [
                'id'    => 40,
                'title' => 'hari_libur_create',
            ],
            [
                'id'    => 41,
                'title' => 'hari_libur_edit',
            ],
            [
                'id'    => 42,
                'title' => 'hari_libur_show',
            ],
            [
                'id'    => 43,
                'title' => 'hari_libur_delete',
            ],
            [
                'id'    => 44,
                'title' => 'hari_libur_access',
            ],
            [
                'id'    => 45,
                'title' => 'presensi_access',
            ],
            [
                'id'    => 46,
                'title' => 'presensi_hadir_create',
            ],
            [
                'id'    => 47,
                'title' => 'presensi_hadir_edit',
            ],
            [
                'id'    => 48,
                'title' => 'presensi_hadir_show',
            ],
            [
                'id'    => 49,
                'title' => 'presensi_hadir_delete',
            ],
            [
                'id'    => 50,
                'title' => 'presensi_hadir_access',
            ],
            [
                'id'    => 51,
                'title' => 'keterangan_create',
            ],
            [
                'id'    => 52,
                'title' => 'keterangan_edit',
            ],
            [
                'id'    => 53,
                'title' => 'keterangan_show',
            ],
            [
                'id'    => 54,
                'title' => 'keterangan_delete',
            ],
            [
                'id'    => 55,
                'title' => 'keterangan_access',
            ],
            [
                'id'    => 56,
                'title' => 'presensi_tidak_hadir_create',
            ],
            [
                'id'    => 57,
                'title' => 'presensi_tidak_hadir_edit',
            ],
            [
                'id'    => 58,
                'title' => 'presensi_tidak_hadir_show',
            ],
            [
                'id'    => 59,
                'title' => 'presensi_tidak_hadir_delete',
            ],
            [
                'id'    => 60,
                'title' => 'presensi_tidak_hadir_access',
            ],
            [
                'id'    => 61,
                'title' => 'laporan_access',
            ],
            [
                'id'    => 62,
                'title' => 'unit_kerja_create',
            ],
            [
                'id'    => 63,
                'title' => 'unit_kerja_edit',
            ],
            [
                'id'    => 64,
                'title' => 'unit_kerja_show',
            ],
            [
                'id'    => 65,
                'title' => 'unit_kerja_delete',
            ],
            [
                'id'    => 66,
                'title' => 'unit_kerja_access',
            ],
            [
                'id'    => 67,
                'title' => 'laporan_harian_create',
            ],
            [
                'id'    => 68,
                'title' => 'laporan_harian_edit',
            ],
            [
                'id'    => 69,
                'title' => 'laporan_harian_show',
            ],
            [
                'id'    => 70,
                'title' => 'laporan_harian_delete',
            ],
            [
                'id'    => 71,
                'title' => 'laporan_harian_access',
            ],
            [
                'id'    => 72,
                'title' => 'laporan_poto_harian_create',
            ],
            [
                'id'    => 73,
                'title' => 'laporan_poto_harian_edit',
            ],
            [
                'id'    => 74,
                'title' => 'laporan_poto_harian_show',
            ],
            [
                'id'    => 75,
                'title' => 'laporan_poto_harian_delete',
            ],
            [
                'id'    => 76,
                'title' => 'laporan_poto_harian_access',
            ],
            [
                'id'    => 77,
                'title' => 'laporan_harian_keterlambatan_create',
            ],
            [
                'id'    => 78,
                'title' => 'laporan_harian_keterlambatan_edit',
            ],
            [
                'id'    => 79,
                'title' => 'laporan_harian_keterlambatan_show',
            ],
            [
                'id'    => 80,
                'title' => 'laporan_harian_keterlambatan_delete',
            ],
            [
                'id'    => 81,
                'title' => 'laporan_harian_keterlambatan_access',
            ],
            [
                'id'    => 82,
                'title' => 'laporan_bulanan_create',
            ],
            [
                'id'    => 83,
                'title' => 'laporan_bulanan_edit',
            ],
            [
                'id'    => 84,
                'title' => 'laporan_bulanan_show',
            ],
            [
                'id'    => 85,
                'title' => 'laporan_bulanan_delete',
            ],
            [
                'id'    => 86,
                'title' => 'laporan_bulanan_access',
            ],
            [
                'id'    => 87,
                'title' => 'laporan_bulan_pegawai_create',
            ],
            [
                'id'    => 88,
                'title' => 'laporan_bulan_pegawai_edit',
            ],
            [
                'id'    => 89,
                'title' => 'laporan_bulan_pegawai_show',
            ],
            [
                'id'    => 90,
                'title' => 'laporan_bulan_pegawai_delete',
            ],
            [
                'id'    => 91,
                'title' => 'laporan_bulan_pegawai_access',
            ],
            [
                'id'    => 92,
                'title' => 'laporan_periodik_create',
            ],
            [
                'id'    => 93,
                'title' => 'laporan_periodik_edit',
            ],
            [
                'id'    => 94,
                'title' => 'laporan_periodik_show',
            ],
            [
                'id'    => 95,
                'title' => 'laporan_periodik_delete',
            ],
            [
                'id'    => 96,
                'title' => 'laporan_periodik_access',
            ],
            [
                'id'    => 97,
                'title' => 'laporan_resume_bulanan_create',
            ],
            [
                'id'    => 98,
                'title' => 'laporan_resume_bulanan_edit',
            ],
            [
                'id'    => 99,
                'title' => 'laporan_resume_bulanan_show',
            ],
            [
                'id'    => 100,
                'title' => 'laporan_resume_bulanan_delete',
            ],
            [
                'id'    => 101,
                'title' => 'laporan_resume_bulanan_access',
            ],
            [
                'id'    => 102,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
