<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function add(CategoryRequest $request)
    {
        Category::create([
           'nameCategory' => $request->nameCategory
        ]);
        return redirect('/');
    }
}
