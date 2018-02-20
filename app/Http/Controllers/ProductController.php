<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('images')->orderBy('created_at', 'desc')->get();
        foreach ($products as $product) {
            if ($product->hasMany('App\Models\Image')) {
                $product->image = $product->images()->orderBy('id','desc')->first();
            }
        }
        return view('catalog', ['allProducts' => $products]);
    }

    public function list() {
        $products = Product::get();
        return view('product-list', ['allProducts' => $products]);
    }

    public function add() {
		return view('product-add');
	}

	public function create(Request $request) {
		$request->validate([
			'name' => 'required',
			'description' => 'required',
			'price' => 'required|numeric',
			'published' => 'required',
			'image' => 'nullable|exists:images,id'
		]);
		$product = new Product();
		$product->name = $request->name;
		$product->description = $request->description;
		$product->price = $request->price;
		$product->published = $request->published ? $request->published : 0;
		$product->save();
		$image = Image::find($request->image)->orderby('id','desc')->first();
		$product->images()->attach($image);
		return redirect()->back()->with('success', 'product added');
	}

    public function view($id) {
        $product = Product::find($id);
        if (is_object($product)) {
            $image = $product->images()->orderBy('id','desc')->first();
            return view('product-view', ['product' => $product, 'image' => $image]);
        }
        return abort(404);
    }

	public function edit(Request $request, $id) {
		$product = Product::find($id);
		if (is_object($product)) {
			$image = $product->images()->orderby('id','desc')->first();	
			return view('product-edit', ['product' => $product, 'image' => $image]);
		}
		abort(404);
	}

	public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|exists:images,id'
        ]);
        $product = Product::find($id);
        if (is_object($product)) {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
			$product->published = $request->published ? $request->published : 0;
            $product->save();
            $image = Image::find($request->image);
            if (is_object($image)) {
                $product->images()->attach($image);
                return redirect()->route('product.view', ['product' => $product, 'image' => $image])->with('success', 'product updated');
            }
       }
       return abort(404);	
	}

    public function delete($id) {
        $message = ['error', 'error deleting product'];
        $product = Product::find($id);
        if (is_object($product) and $product->hasMany('\App\Models\Image')) {
            $product->images()->detach();
            Product::destroy($id);
            $message = ['sucess', 'product deleted'];
        }
        return $this->list()->with($message[0], $message[1]);
    }

	public function addToCart(Request $request, $id) {
		return redirect()->back()->with('success', 'product added to cart');
	}
}
