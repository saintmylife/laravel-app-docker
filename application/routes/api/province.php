<?php

Route::prefix('provinces')->middleware('auth')->group(function() {
    Route::get('/', 'Index\ProvinceIndexAction')->name('province.index');
    // Route::post('/create', 'Create\RoleCreateAction')->name('role.create')->middleware('permission:role-access');
    // Route::get('/{id}', 'Fetch\RoleFetchAction')->name('role.fetch')->middleware('permission:role-access');
    // Route::put('/{id}', 'Edit\RoleEditAction')->name('role.edit')->middleware('permission:role-access');
    // Route::delete('/{id}', 'Delete\RoleDeleteAction')->name('role.delete')->middleware('permission:role-access');
});
