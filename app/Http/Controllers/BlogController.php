<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Image;

class BlogController extends Controller
{
    public function index() {
		$posts = BlogPost::with('images')->orderBy('created_at', 'desc')->get();
		foreach ($posts as $post) {
			if ($post->hasMany('App\Models\Image')) {
				$post->image = $post->images()->orderBy('id','desc')->first();
			}
		}
		return view('blog', ['allPosts' => $posts]);
    }

    public function list() {
        $posts = BlogPost::get();
		return view('blog-list', ['allPosts' => $posts]);
    }

    public function add() {
		return view('blog-post-add');
    }

    public function create(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
		$blogPost = new BlogPost();
        $blogPost->title = $request->input('title');
        $blogPost->body = $request->input('body');
        $blogPost->published = $request->input('published') ? $request->input('published') : 0;
		// Store relation with image
		$image = Image::find($request->input('image'));
        $blogPost->save();
		$blogPost->images()->attach($image);

        return redirect('/admin/blog/add')->with('success', 'Blog post added');
    }

    public function view($id) {
        $blogPost = BlogPost::find($id);
        if (is_object($blogPost)) {
			$image = $blogPost->images()->orderBy('id','desc')->first();
            return view('blog-post-view', ['post' => $blogPost, 'image' => $image]);
        }

        return abort(404);
    }

    public function edit($id) {
        $blogPost = BlogPost::find($id);
        if (is_object($blogPost)) {
			$image = $blogPost->images()->orderBy('id', 'desc')->first();

            return view('blog-post-edit', ['post' => $blogPost, 'image' => $image]);
        }
        return abort(404);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $blogPost = BlogPost::find($id);
        if (is_object($blogPost)) {
            $blogPost->title = $request->title;
            $blogPost->body = $request->body;
            $blogPost->published = $request->published ? $request->published : 0;
            $blogPost->save();
			$image = Image::find($request->input('image'));
			if (is_object($image)) {
				$blogPost->images()->attach($image);
	
    	        return redirect()->route('blog.view', ['post' => $blogPost, 'image' => $image])->with('success', 'Blog post updated');
			}
       }
       return abort(404);
    }

    public function delete($id) {
		$message = ['error', 'Error deleting blog post'];
		$blogPost = BlogPost::find($id);
		if (is_object($blogPost) and $blogPost->hasMany('App\Models\Image')) {
			$blogPost->images()->detach();
    	    BlogPost::destroy($id);
			$message = ['sucess', 'Blog post deleted'];
		}
        return $this->list()->with($message[0], $message[1]);
    }
}

