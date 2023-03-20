<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'linkedin_url'
    ];

    
}