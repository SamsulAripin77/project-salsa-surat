<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Jabatan
    Route::apiResource('jabatans', 'JabatanApiController');

    // Shift
    Route::apiResource('shifts', 'ShiftApiController');

    // Jadwal
    Route::apiResource('jadwals', 'JadwalApiController');

    // Hari Libur
    Route::apiResource('hari-liburs', 'HariLiburApiController');

    // Presensi Hadir
    Route::post('presensi-hadirs/media', 'PresensiHadirApiController@storeMedia')->name('presensi-hadirs.storeMedia');
    Route::apiResource('presensi-hadirs', 'PresensiHadirApiController');

    // Keterangan
    Route::apiResource('keterangans', 'KeteranganApiController');

    // Presensi Tidak Hadir
    Route::apiResource('presensi-tidak-hadirs', 'PresensiTidakHadirApiController');

    // Unit Kerja
    Route::apiResource('unit-kerjas', 'UnitKerjaApiController');
});
