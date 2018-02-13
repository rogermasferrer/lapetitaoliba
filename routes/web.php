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

// Authentication routes
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

// Application routes
Route::get('/', 'BlogController@index');
Route::get('/home', function() {
	return redirect(route('admin'));
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

// View blog
Route::get('blog', 'BlogController@index');
// View a blog post
Route::get('blog/{id}', 'BlogController@view')->name('blog.view');

// View product catalog
Route::get('catalog', 'CatalogController@view');
// View product
Route::get('product/{id}', 'ProductController@view');

Route::middleware(['auth','check_role:admin'])->group(function() {
	Route::prefix('admin')->group(function() {
		/////////////////////////////////////////////////////////////////////////////////////
		// ADMIN
		/////////////////////////////////////////////////////////////////////////////////////

		Route::get('/', 'AdminController@index')->name('admin');
		/////////////////////////////////////////////////////////////////////////////////////
		// BLOG
		/////////////////////////////////////////////////////////////////////////////////////
		// View all blog posts
		Route::get('blog', 'BlogController@list')->name('blog.list');;
		// Add blog post
		Route::get('blog/add', 'BlogController@add')->name('blogpost.add'); 
		Route::post('blog/add', 'BlogController@create');
		// Edit a blog post
		Route::get('blog/edit/{id}', 'BlogController@edit');
		Route::post('blog/edit/{id}', 'BlogController@update');
		// Delte a blog post
		Route::post('blog/delete/{id}', 'BlogController@delete');

		//////////////////////////////////////////////////////////////////////////////////////
		// IMAGES
		//////////////////////////////////////////////////////////////////////////////////////
		// View all uploaded images
		Route::get('images' , 'ImagesController@list')->name('images.list');
		// Upload image
		Route::get('images/add', 'ImagesController@add')->name('images.add');
		Route::post('images/add', 'ImagesController@create');
		// View an image

		// Edit an image
		Route::get('images/edit/{id}', 'ImagesController@edit');
		Route::post('images/edit/{id}', 'ImagesController@update');
		// Delete an image
		Route::post('images/delete/{id}', 'ImagesController@delete');

		//////////////////////////////////////////////////////////////////////////////////////
		// PRODUCTS
		//////////////////////////////////////////////////////////////////////////////////////
		// Add product
		Route::get('product/add', 'ProductController@add');
		
	});
});

// Contact form
Route::get('/contact', 'ContactEmailController@add');
Route::post('contact', 'ContactEmailController@send');


