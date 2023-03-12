<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'content',
        'status',
        'user_id',
        'image',
        'category_id'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function renderContent() {
        return new HtmlString($this->content);
    }

    public function getHumanize() {
        return $this->created_at->diffForHumans();
    }

    public function getShortTitle($limit = null) {
        return Str::of($this->title)->limit($limit ?? 25);
        // return Str::limit($this->title, 10, '...');
    }

    public function getShortContent($content = null) {
        return Str::of(strip_tags($content ?? $this->content))->limit(100, end:'...');
    }

    public static function checkSlug($slug) {
        $exists = Blog::where('slug', $slug)->exists();
        return $exists;
    }

    public static function getGuestList() {
        $blogs  = Blog::all();
        $blogs->map(function ($data) {
            $data->setAttribute('short', Blog::getShortContent($data->content) );
        });
        return $blogs;
    }

    public static function getPostBySlug($slug) {
        $blog = Blog::where('slug', $slug);

        return $blog->first();
    }

    public static function getRecentPosts() {
        $blogs  = Blog::latest()->limit(5);
        return $blogs->get();
    }
}
