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

Route::get('/admin', function () {
    return view('auth.login');
});
//------------------------ADMIN----------------------------//
//------------------------panel----------------------------//
Route::get('/panel', 'admin\PanelController@index')->middleware('auth');
//--------------------end panel----------------------------//

//------------------------users----------------------------//
Route::get('/panel/users/{id}', 'admin\UsersController@show');
Route::get('/panel/users/{id}/edit', 'admin\UsersController@edit');
Route::resource('/panel/users', 'admin\UsersController')->middleware('auth');
//------------------------end users----------------------------//
//------------------------categories--------------------------//
Route::resource('/panel/categories', 'admin\CategoryController')->middleware('auth');
//----------------------end categories-----------------------//

//------------------------posts----------------------------//
Route::resource('/panel/posts', 'admin\PostsController')->middleware('auth');
Route::get('about', ['as' => 'page.about', 'admin\PostsController']);
Route::post('/panel/posts/addGallery/{id}', 'admin\PostsController@galleryStore');
//------------------------end posts----------------------------//
Auth::routes();
//------------------------END ADMIN------------------------//

//------------------------posts----------------------------//
Route::resource('/', 'PostsController');
Route::get('/posts/{id}', 'PostsController@show');
//------------------------end posts----------------------------//
//------------------------categories----------------------------//
Route::get('/category/{id}','CategoryController@show');
//------------------------end categories----------------------------//
//------------------------comments----------------------------//
Route::resource('/comments','CommentsController');
//------------------------end comments----------------------------//

//-------------------------images------------------------------//
Route::get('/post-image/{id}/{size}', 'ImagesController@postImage');
Route::get('/post-image-single/{id}/{size}', 'ImagesController@postImageResize');

Route::get('/category-image/{id}/{size}', 'ImagesController@categoryImage');
Route::get('/category-image-single/{id}/{size}', 'ImagesController@categoryImageResize');
