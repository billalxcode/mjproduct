<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title      = fake('id_ID')->text();
        $slug       = Str::slug($title);
        $content    = fake('id_ID')->paragraph(random_int(5, 10));
        $status     = Arr::random(['publish', 'private']);

        $user       = User::all('id')->random();
        $category   = Category::all('id')->random();

        return [
            'slug'          => $slug,
            'title'         => $title,
            'content'       => $content,
            'status'        => $status,
            'user_id'       => $user->id,
            'category_id'   => $category->id
        ];
    }
}
