<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers\User;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view(route('index'));
});

    // Fontend Controller Routes
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('aboutus', [FrontendController::class, 'aboutus'])->name('aboutus');
    Route::get('blog/details', [FrontendController::class, 'blogdetails'])->name('blog.details');
    Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
    Route::get('contactus', [FrontendController::class, 'contactus'])->name('contactus');
    Route::get('planing/event', [FrontendController::class, 'planingevent'])->name('planing.event');
    Route::get('price/plan', [FrontendController::class, 'priceplan'])->name('price.plan');
    Route::get('search/result', [FrontendController::class, 'searchresult'])->name('search.result');

    // User Dashboard Routes
    Route::group(
        ['namespace' => 'User', 'middleware' => 'auth'],
        function () {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::get('dashboard/restrict/user', 'DashboardController@restrictuser')->name('dashboard.restrict.user');
            // Route::get('user/logout', 'UserDashboardController@logout')->name('logout');
            Route::resources([
                // 'myorder' => 'OrderShowController',
                // 'transection' => 'TransectionController',
                // 'myorder' => 'UserOrderController',
            ]);

            // Route::get('user/profile', 'UserProfileController@index')->name('user.profile');
            // Route::get('user/profile/edit', 'UserProfileController@edit')->name('user.profile.edit');
            // Route::post('user/profile/update', 'UserProfileController@update')->name('user.profile.update');
            // Route::get('user/setting', 'UserProfileController@setting')->name('user.setting');
            // Route::post('user/setting/update', 'UserProfileController@changepassword')->name('user.setting.update');
        }
    );




require __DIR__.'/auth.php';
require __DIR__.'/admin.php';