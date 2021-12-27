<?php

Route::prefix('auth')->group(function() {
    Route::get('/me', 'Profile\AuthProfileAction')->middleware('auth')->name('auth.profile');
    Route::post('/login', 'Login\AuthLoginAction')->name('auth.login');
    Route::post('/logout', 'Logout\AuthLogoutAction')->name('auth.logout');
    Route::get('/refresh', 'Refresh\AuthRefreshAction')->name('auth.refresh');
});
