<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    //kategori
    Route::resource('kategoris','KategoriController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Jabatan
    Route::delete('jabatans/destroy', 'JabatanController@massDestroy')->name('jabatans.massDestroy');
    Route::resource('jabatans', 'JabatanController');

    // Shift
    Route::delete('shifts/destroy', 'ShiftController@massDestroy')->name('shifts.massDestroy');
    Route::resource('shifts', 'ShiftController');

    // Jadwal
    Route::delete('jadwals/destroy', 'JadwalController@massDestroy')->name('jadwals.massDestroy');
    Route::resource('jadwals', 'JadwalController');

    // Hari Libur
    Route::delete('hari-liburs/destroy', 'HariLiburController@massDestroy')->name('hari-liburs.massDestroy');
    Route::resource('hari-liburs', 'HariLiburController');

    // Presensi Hadir
    Route::delete('presensi-hadirs/destroy', 'PresensiHadirController@massDestroy')->name('presensi-hadirs.massDestroy');
    Route::post('presensi-hadirs/media', 'PresensiHadirController@storeMedia')->name('presensi-hadirs.storeMedia');
    Route::post('presensi-hadirs/ckmedia', 'PresensiHadirController@storeCKEditorImages')->name('presensi-hadirs.storeCKEditorImages');
    Route::resource('presensi-hadirs', 'PresensiHadirController');

    // Keterangan
    Route::delete('keterangans/destroy', 'KeteranganController@massDestroy')->name('keterangans.massDestroy');
    Route::resource('keterangans', 'KeteranganController');

    // Presensi Tidak Hadir
    Route::delete('presensi-tidak-hadirs/destroy', 'PresensiTidakHadirController@massDestroy')->name('presensi-tidak-hadirs.massDestroy');
    Route::resource('presensi-tidak-hadirs', 'PresensiTidakHadirController');

    // Unit Kerja
    Route::delete('unit-kerjas/destroy', 'UnitKerjaController@massDestroy')->name('unit-kerjas.massDestroy');
    Route::resource('unit-kerjas', 'UnitKerjaController');

    // Laporan Harian
    Route::delete('laporan-harians/destroy', 'LaporanHarianController@massDestroy')->name('laporan-harians.massDestroy');
    Route::resource('laporan-harians', 'LaporanHarianController');

    // Laporan Poto Harian
    Route::delete('laporan-poto-harians/destroy', 'LaporanPotoHarianController@massDestroy')->name('laporan-poto-harians.massDestroy');
    Route::resource('laporan-poto-harians', 'LaporanPotoHarianController');

    // Laporan Harian Keterlambatan
    Route::delete('laporan-harian-keterlambatans/destroy', 'LaporanHarianKeterlambatanController@massDestroy')->name('laporan-harian-keterlambatans.massDestroy');
    Route::resource('laporan-harian-keterlambatans', 'LaporanHarianKeterlambatanController');

    // Laporan Bulanan
    Route::delete('laporan-bulanans/destroy', 'LaporanBulananController@massDestroy')->name('laporan-bulanans.massDestroy');
    Route::resource('laporan-bulanans', 'LaporanBulananController');

    // Laporan Bulan Pegawai
    Route::delete('laporan-bulan-pegawais/destroy', 'LaporanBulanPegawaiController@massDestroy')->name('laporan-bulan-pegawais.massDestroy');
    Route::resource('laporan-bulan-pegawais', 'LaporanBulanPegawaiController');

    // Laporan Periodik
    Route::delete('laporan-periodiks/destroy', 'LaporanPeriodikController@massDestroy')->name('laporan-periodiks.massDestroy');
    Route::resource('laporan-periodiks', 'LaporanPeriodikController');

    // Laporan Resume Bulanan
    Route::delete('laporan-resume-bulanans/destroy', 'LaporanResumeBulananController@massDestroy')->name('laporan-resume-bulanans.massDestroy');
    Route::resource('laporan-resume-bulanans', 'LaporanResumeBulananController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Jabatan
    Route::delete('jabatans/destroy', 'JabatanController@massDestroy')->name('jabatans.massDestroy');
    Route::resource('jabatans', 'JabatanController');

    // Shift
    Route::delete('shifts/destroy', 'ShiftController@massDestroy')->name('shifts.massDestroy');
    Route::resource('shifts', 'ShiftController');

    // Jadwal
    Route::delete('jadwals/destroy', 'JadwalController@massDestroy')->name('jadwals.massDestroy');
    Route::resource('jadwals', 'JadwalController');

    // Hari Libur
    Route::delete('hari-liburs/destroy', 'HariLiburController@massDestroy')->name('hari-liburs.massDestroy');
    Route::resource('hari-liburs', 'HariLiburController');

    // Presensi Hadir
    Route::delete('presensi-hadirs/destroy', 'PresensiHadirController@massDestroy')->name('presensi-hadirs.massDestroy');
    Route::post('presensi-hadirs/media', 'PresensiHadirController@storeMedia')->name('presensi-hadirs.storeMedia');
    Route::post('presensi-hadirs/ckmedia', 'PresensiHadirController@storeCKEditorImages')->name('presensi-hadirs.storeCKEditorImages');
    Route::resource('presensi-hadirs', 'PresensiHadirController');

    // Keterangan
    Route::delete('keterangans/destroy', 'KeteranganController@massDestroy')->name('keterangans.massDestroy');
    Route::resource('keterangans', 'KeteranganController');

    // Presensi Tidak Hadir
    Route::delete('presensi-tidak-hadirs/destroy', 'PresensiTidakHadirController@massDestroy')->name('presensi-tidak-hadirs.massDestroy');
    Route::resource('presensi-tidak-hadirs', 'PresensiTidakHadirController');

    // Unit Kerja
    Route::delete('unit-kerjas/destroy', 'UnitKerjaController@massDestroy')->name('unit-kerjas.massDestroy');
    Route::resource('unit-kerjas', 'UnitKerjaController');

    // Laporan Harian
    Route::delete('laporan-harians/destroy', 'LaporanHarianController@massDestroy')->name('laporan-harians.massDestroy');
    Route::resource('laporan-harians', 'LaporanHarianController');

    // Laporan Poto Harian
    Route::delete('laporan-poto-harians/destroy', 'LaporanPotoHarianController@massDestroy')->name('laporan-poto-harians.massDestroy');
    Route::resource('laporan-poto-harians', 'LaporanPotoHarianController');

    // Laporan Harian Keterlambatan
    Route::delete('laporan-harian-keterlambatans/destroy', 'LaporanHarianKeterlambatanController@massDestroy')->name('laporan-harian-keterlambatans.massDestroy');
    Route::resource('laporan-harian-keterlambatans', 'LaporanHarianKeterlambatanController');

    // Laporan Bulanan
    Route::delete('laporan-bulanans/destroy', 'LaporanBulananController@massDestroy')->name('laporan-bulanans.massDestroy');
    Route::resource('laporan-bulanans', 'LaporanBulananController');

    // Laporan Bulan Pegawai
    Route::delete('laporan-bulan-pegawais/destroy', 'LaporanBulanPegawaiController@massDestroy')->name('laporan-bulan-pegawais.massDestroy');
    Route::resource('laporan-bulan-pegawais', 'LaporanBulanPegawaiController');

    // Laporan Periodik
    Route::delete('laporan-periodiks/destroy', 'LaporanPeriodikController@massDestroy')->name('laporan-periodiks.massDestroy');
    Route::resource('laporan-periodiks', 'LaporanPeriodikController');

    // Laporan Resume Bulanan
    Route::delete('laporan-resume-bulanans/destroy', 'LaporanResumeBulananController@massDestroy')->name('laporan-resume-bulanans.massDestroy');
    Route::resource('laporan-resume-bulanans', 'LaporanResumeBulananController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
