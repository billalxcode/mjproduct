<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $recentPosts    = Blog::getRecentPosts();

        return view('frontend.index', [
            'recentPosts'   => $recentPosts
        ]);
    }
}
