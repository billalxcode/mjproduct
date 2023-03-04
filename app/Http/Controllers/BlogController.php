<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index', [
            'blogs' => Blog::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.new', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $title      = $request->title;
        $content    = $request->content;
        $status     = $request->status;
        $slug       = Str::slug($title);
        
        $slugExists = Blog::checkSlug($slug);

        Blog::create([
            'title'     => $title,
            'content'   => $content,
            'status'    => $status,
            'slug'      => $slug,
            'user_id'   => auth()->user()->id,
            'category_id'=> Category::getRandomChoice()->id
        ]);

        return redirect()->back()->with('success', __('Success create post'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog, Request $request, $id)
    {
        $blogs = $blog->find($id);
        
        return view('blog.edit', [
            'action' => route('dashboard.blog.update', $id),
            'blogs' => $blogs
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog, $id)
    {
        $blog_fill = $blog->find($id)->fill($request->validated());
        $blog_fill->save();

        return redirect()->back()->with('success', 'Article has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog, Request $request)
    {
        $post_id    = $request->post('post_id');

        $post       = $blog->find($post_id);
        $post->delete();

        return redirect()->route('dashboard.blog')->with('success', 'Article has been deleted.');
    }
}
