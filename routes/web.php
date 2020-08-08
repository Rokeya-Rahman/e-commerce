<?php

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
    return view('welcome');
});



Route::group(['middleware' => 'admin'], function () {

    Route::get('setting/account-setting', [
        'uses'  =>  'AdminController@accountSetting',
         'as'   =>  'account-setting'
    ]);

    Route::get('setting/edit-password', [
        'uses'  =>  'AdminController@editPassword',
         'as'   =>  'edit-password'
    ]);

    Route::post('setting/change-password', [
        'uses'  =>  'AdminController@changePassword',
         'as'   =>  'change-password'
    ]);

    Route::post('setting/new-password', [
        'uses'  =>  'AdminController@newPassword',
         'as'   =>  'new-password'
    ]);

});


Route::group(['middleware' => 'category'], function () {

    Route::get('/category/add-category', [
        'uses'   =>  'categoryController@addCategory',
         'as'    =>  'add-category'
    ]);

    Route::post('/category/save-category', [
        'uses'   =>  'categoryController@saveCategory',
         'as'    =>  'save-category'
    ]);

    Route::get('/category/manage-category', [
        'uses'   =>  'categoryController@manageCategory',
         'as'    =>  'manage-category'
    ]);

    Route::get('/category/view-details/{id}', [
        'uses'   =>  'categoryController@viewDetails',
         'as'    =>  'view-details'
    ]);

    Route::post('/category/unpublished-category', [
        'uses'   =>  'categoryController@unpublishedCategory',
         'as'    =>  'unpublished-category'
    ]);

    Route::post('/category/published-category', [
        'uses'   =>  'categoryController@publishedCategory',
         'as'    =>  'published-category'
    ]);

    Route::get('/category/edit-category/{id}', [
        'uses'   =>  'categoryController@editCategory',
         'as'    =>  'edit-category'
    ]);

    Route::post('/category/update-category', [
        'uses'   =>  'categoryController@updateCategory',
         'as'    =>  'update-category'
    ]);

    Route::post('/category/delete-category', [
        'uses'   =>  'categoryController@deleteCategory',
         'as'    =>  'delete-category'
    ]);

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
