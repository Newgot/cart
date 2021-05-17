<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $catProducts = [];
        $categories = Category::all()->toArray();
        foreach ($categories as $category) {
            $nameCategory = $category['nameCategory'];
            $idCategory = $category['idCategory'];
            $catProducts[$nameCategory] = Product::getCategoryProducts($idCategory);
        }
        return view('products.all', compact('catProducts'));
    }

    public function renderAddForm()
    {
        $categories = Category::all();
        return view('products.add', compact('categories'));
    }

    public function add(ProductRequest $request)
    {
        Product::createProduct($request);
        return redirect(route('home'));
    }
}
