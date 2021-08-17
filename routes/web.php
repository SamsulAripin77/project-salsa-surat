<?php

Route::view('/', 'auth/login');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // R
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    //surat masuks
    Route::get('surat-masuks/laporan','SuratMasukController@laporan')->name('suratmasuks-laporan');
    Route::resource('suratmasuks','SuratMasukController');

    //surat keluar
    Route::get('surat-keluars/laporan','SuratKeluarController@laporan')->name('suratkeluars-laporan');
    Route::resource('suratkeluars','SuratKeluarController');

    //pengarahan surat masuks
    Route::get('pengarahansuratmasuks/penerima','PengarahanSuratMasukController@penerima_edit');
    Route::put('pengarahansuratmasuks/penerima','PengarahanSuratMasukController@penerima_update');
    Route::resource('pengarahansuratmasuks','PengarahanSuratMasukController');

     //pengarahan surat keluar
     Route::resource('pengarahansuratkeluars','PengarahanSuratKeluarController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    //kategori
    Route::resource('kategoris','KategoriController');


    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

   
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
