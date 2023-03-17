<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_description',
        'project_banner',
        'project_start_date',
        'project_status'
    ];

    public function getHumanize() {
        return $this->created_at->diffForHumans();
    }
    
    public function getShortContent($content = null) {
        return Str::of(strip_tags($content ?? $this->project_description))->limit(100, end:'...');
    }
}
