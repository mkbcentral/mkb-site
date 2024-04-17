<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Volt::route('/manage-profile', 'pages.profile.manage-profile')->name('manage.profile');
});





require __DIR__ . '/auth.php';
