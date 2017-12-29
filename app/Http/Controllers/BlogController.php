<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index() {
       $posts = BlogPost::get();
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
        $blogPost->title = $request['title'];
        $blogPost->body = $request['body'];
        $blogPost->published = $request['published'] ? $request['published'] : 0;
        $blogPost->save();

        return redirect('/admin/blog/add')->with('success', 'Blog post added');
    }

    public function view($id) {
        $blogPost = BlogPost::find($id);
        if (is_object($blogPost)) {
            return view('blog-post-view', ['title' => $blogPost->title, 'body' => $blogPost->body]);
        }
        return abort(404);
    }

    public function edit($id) {
        $blogPost = BlogPost::find($id);
        if (is_object($blogPost)) {
            return view('blog-post-edit', ['id' => $id, 'title' => $blogPost->title, 'body' => $blogPost->body, 'published' => $blogPost->published]);
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
            return redirect()->route('blog-view', ['id' => $id])->with('success', 'Blog post updated');
       }
       return abort(404);
    }

    public function delete($id) {
        BlogPost::destroy($id);
        return $this->list();
    }
}

