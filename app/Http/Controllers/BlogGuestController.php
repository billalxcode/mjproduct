<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query  = $request->get('q');
        if ($query) {
            $blogs = Blog::where('status', 'publish')
                ->orWhere('content', 'LIKE', "%$query%")
                ->orWhere('title', 'LIKE', "%$query%")
                ->paginate(5);
        } else {
            $blogs = Blog::where('status', 'publish')->paginate(5);
        }
        $recentPosts    = Blog::getRecentPosts();
        $categories     = Category::getCategoriesWithCountPost();

        // dd($blogs);
        return view('frontend.blog.index', [
            'blogs' => $blogs,
            'recentPosts'   => $recentPosts,
            'categories'    => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $blog = Blog::getPostBySlug($slug);
        $recentPosts    = Blog::getRecentPosts();
        $categories     = Category::getCategoriesWithCountPost();
        
        return view('frontend.blog.show', [
            'blog' => $blog,
            'recentPosts'   => $recentPosts,
            'categories'    => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
