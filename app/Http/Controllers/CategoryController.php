<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('category.index', compact('categories'));
    }
}
