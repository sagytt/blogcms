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

use App\Category;
use App\Post;
use App\Setting;

Route::get('/', 'FrontEndController@index')->name('index');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    //POSTS
    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::post('/post/store', 'PostsController@store')->name('post.store');
    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::get('/posts', 'PostsController@index')->name('posts');
    Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::get('/posts/kill/{id}', 'PostsController@kill')->name('posts.kill');
    Route::get('/posts/restore/{id}', 'PostsController@restore')->name('posts.restore');
    Route::get('/posts/edit/{id}', 'PostsController@edit')->name('posts.edit');
    Route::post('/posts/update/{id}', 'PostsController@update')->name('posts.update');
    //CATEGORIES
    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    Route::get('/categories', 'CategoriesController@index')->name('categories');
    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

    Route::get('/category/{id}', 'FrontEndController@category')->name('category.single');
    // TAGS
    Route::get('/tag', 'TagsController@index')->name('tags');
    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');
    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');
    Route::get('/tag/create', 'TagsController@create')->name('tag.create');
    Route::post('/tag/store', 'TagsController@store')->name('tag.store');

    Route::get('/tag/{id}', 'FrontEndController@tag')->name('tag.single');
    //USERS
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/users/create', 'UsersController@create')->name('user.create');
    Route::post('/users/store', 'UsersController@store')->name('user.store');
    Route::get('/user/admin/{id}', 'UsersController@admin')->name('user.admin')->middleware('admin');
    Route::get('/user/not-admin/{id}', 'UsersController@not_admin')->name('user.not.admin');
    //Profiles
    Route::get('/user/profile', 'ProfilesController@index')->name('user.profile');
    Route::post('/user/profile/update', 'ProfilesController@update')->name('user.profile.update');
    Route::get('user/delete/{id}', 'UsersController@destroy')->name('user.delete');
    //Site Settings
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

    Route::get('/post/{slug}', 'FrontEndController@singlePost')->name('post.single');

});


////-----Search Part-----////
Route::get('/results', function () {
    $posts = Post::where('title', 'like', '%'. request('query') . '%')->get(); //for seaching with wildcard %
    return view('results')
        ->with('posts', $posts)
        ->with('title', 'Search results :' . request('query'))
        ->with('settings', Setting::first())
        ->with('categories', Category::take(5)->get())
        ->with('query', request('query'));
});


