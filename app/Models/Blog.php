<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'content',
        'status',
        
    ];

    protected $hidden = [
        'user_id', 'category_id'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getHumanize() {
        return $this->created_at->diffForHumans();
    }

    public function getShortTitle() {
        return Str::of($this->title)->limit(25);
        // return Str::limit($this->title, 10, '...');
    }

    public function getShortContent() {
        return Str::of($this->title)->limit(500);
    }
}
