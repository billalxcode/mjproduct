<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    protected $hidden = [
        'parent_id'
    ];

    public function post() {
        
    }

    public static function getRandomChoice() {
        $alls = Category::all()->random();

        return $alls;
    }

    public static function getCategoriesWithCountPost() {
        $categories     = Category::all(['id', 'name']);
        $categories     = $categories->map(function ($data) {
            $category_id    = $data->id;
            $posts_counts   = Blog::where('category_id', $category_id)->count();
            $data->setAttribute('posts', $posts_counts);

            return $data;
        })->sortByDesc('posts')->slice(0, 8);

        return $categories;
    }
}
