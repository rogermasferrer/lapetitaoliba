<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
		$menus = ['blog' => [],'images' => [],'products' => []];
		$menus['blog'] = ['add new post' => route('blogpost.add'), 'manage posts' => route('blog.list')]; 
		$menus['images'] = ['add new image' => route('image.add'), 'manage images' => route('image.list')];
		$menus['products'] = ['add new product' => route('product.add'), 'manage products' => route('product.list')];
		return view('admin', ['menus' => $menus]);
	}
}
