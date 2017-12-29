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
    return view('container');
});

//Route::middleware(['VerifyCsrfToken'])->group(function() {
//Route::get('hello', function() {
//    return 'hello';
//});
//// un pattern per a type està definit al Route controller, però aquest el sobreescriu
//Route::get('type/{type}', function($type) {
//    return "type: $type";
//})->where(['type' => '[a-z]+']);
//
//// La funció name() permet anomenar una url i referir-s'hi pel nom
//Route::get('ruta/nominal', function() {
//    return "Ruta nominal";
//})->name('named');

//Route::get('home', 'HomeController@index');

// View all blog posts
Route::get('blog', 'BlogController@index');
// List all blog posts
Route::get('admin/blog', 'BlogController@list');
// Add blog post
Route::get('admin/blog/add', function() {
    return view('blog-post-add');
});
Route::post('admin/blog/add', 'BlogController@create');
// View a blog post
Route::get('admin/blog/{id}', 'BlogController@view')->name('blog-view');
// Edit a blog post
Route::get('admin/blog/edit/{id}', 'BlogController@edit');
Route::post('admin/blog/edit/{id}', 'BlogController@update');
// Delte a blog post
Route::post('admin/blog/delete/{id}', 'BlogController@delete');

