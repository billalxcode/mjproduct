<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_name',
        'person_position',
        'person_description',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'image'
    ];

    public function description() {
        $html = strip_tags($this->person_description);
        return $html;
        // return Str::limit($html, 100);
    }
}
