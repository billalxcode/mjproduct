<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $recentPosts    = Blog::getRecentPosts();
        $portfolio      = Project::all();

        return view('frontend.index', [
            'recentPosts'   => $recentPosts,
            'portfolio'     => $portfolio
        ]);
    }
}
