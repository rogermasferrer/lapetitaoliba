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
	return redirect()->intended();
});

// View blog
Route::get('blog', 'BlogController@index');
// View a blog post
Route::get('blog/{id}', 'BlogController@view')->name('blog.view');

// View product catalog
Route::get('catalog', 'ProductController@index');
// View a product
Route::get('product/{id}', 'ProductController@view')->name('product.view');
// Add product to cart
Route::post('product/{id}', 'ProductController@addToCart');

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
		Route::get('images' , 'ImagesController@list')->name('image.list');
		// Upload image
		Route::get('images/add', 'ImagesController@add')->name('image.add');
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
		// View all blog posts
		Route::get('products', 'ProductController@list')->name('product.list');;
		// Add product
		Route::get('product/add', 'ProductController@add')->name('product.add');
		Route::post('product/add', 'ProductController@create');
		// Edit a product
		Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
		Route::post('product/edit/{id}', 'ProductController@update');
		// Delete a product
		Route::post('product/delete/{id}', 'ProductController@delete');
	});
});

// Actions for which you need to be authenticated
Route::middleware('auth')->group(function() {
	// Order email when buying
	Route::any('order/send/{id}', 'OrderController@send');
});

// Contact form
Route::get('/contact', 'ContactEmailController@add');
Route::post('contact', 'ContactEmailController@send');


