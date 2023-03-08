<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $option     = $request->post('option');

        if ($option == 'new') {
            $validator  = Validator::make($request->all(), [
                'name'  => 'required|string|unique:categories'
            ]);
            if ($validator->fails()) {
                return new BaseResource(400, 'Data not valid!', validator:$validator);
            } else {
                $slug   = Str::slug($request->post('name'), language:'id') . strval(random_int(1, 100));
                Category::create([
                    'name'  => $request->post('name'),
                    'slug'  => $slug
                ]);

                return new BaseResource(200, 'Success create category');
            }
        } else if ($option == 'get') {
            $name   = $request->post('text');
            if (isset($name) && $name != '') {
                $categories = Category::where('name', 'LIKE', "%{$name}%")->get();
            } else {
                $categories     = Category::all();
            }
            $categories_data    = CategoryResource::collection($categories);
            return $categories_data;
            // return new BaseResource(200, '', data:$categories_data);
        }
    }
}
