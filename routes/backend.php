<?php

use App\Http\Controllers\backend\CMS\landingPage\LandingPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\dashboard\DashboardController;
use App\Http\Controllers\backend\CMS\upcomingImage\UpcommingAlbumSliderImageController;
use App\Http\Controllers\backend\UpcommingAlbumController;

// backend route start
Route::middleware(['auth', 'admin'])->group(function () {});
//Admin Dashboard
Route::get('/adminDashboard', [DashboardController::class, 'index'])->name('adminDashboard');

//upcoming album image routes
Route::controller(UpcommingAlbumController::class)->group(function () {
    Route::get('upcomming/album', 'index')->name('upcomming.album.index');
    Route::get('upcomming/album/create', 'create')->name('upcomming.album.create');
    Route::post('upcomming/album/store', 'store')->name('upcomming.album.store');
    Route::delete('upcomming/album/delete/{id}', 'destroy')->name('upcomming.album.delete');
});


//Route for landing page
Route::controller(LandingPageController::class)->group(function () {
    Route::get('landingpage/banner', 'banner')->name('landingpage.banner');
    Route::match(['post', 'put'], 'landingpage/banner/update/{id}', 'bannerUpdate')->name('landingpage.banner.update');
});








// backend route end
