<?php

Route::prefix('sites')->middleware('auth')->group(function() {
    Route::get('/', 'Index\SiteIndexAction')->name('site.index');
    Route::post('/create', 'Create\SiteCreateAction')->name('site.create')->middleware('permission:create-sites');
    Route::get('/{id}', 'Fetch\SiteFetchAction')->name('site.fetch');
    Route::put('/{id}', 'Edit\SiteEditAction')->name('site.edit')->middleware('permission:edit-sites');
    Route::delete('/{id}', 'Delete\SiteDeleteAction')->name('site.delete')->middleware('permission:delete-sites');
});
