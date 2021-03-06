<?php

use Illuminate\Support\Facades\Route;

    // Admin panel Routes
    Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function () {

        Route::get('admin/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');
        Route::resources([
        'users' => 'UserController',
        'restaurant' => 'RestaurantController',
        'special/foods/catering' => 'SpecialCateringGoodsController',
        'food/package' => 'FoodPackageController',
        'categories' => 'CategoryController',
        'blogcategories' => 'BlogCategoryController',
        'blogs' => 'BlogController',
        'admin/orders' => 'OrdershowController',
        'admin/subscriber' => 'SubscribeController',
        'admin/visitor/querstion' => 'VisitorQueryController',
        ]);
        Route::get('pending/restaurant', 'RestaurantController@pendingrestaurant')->name('pending.restaurant');
        Route::get('approved/restaurant/{id}', 'RestaurantController@restaurantpublished')->name('restaurant.published');

        Route::get('admin/profile', 'ProfileController@index')->name('admin.user.profile');
        Route::get('admin/profile/edit', 'ProfileController@edit')->name('admin.user.profile.edit');
        Route::post('admin/profile/update', 'ProfileController@update')->name('admin.user.profile.update');
        Route::get('admin/setting', 'ProfileController@setting')->name('admin.user.setting');
        Route::post('admin/setting/update', 'ProfileController@changepassword')->name('admin.user.setting.update');

    });