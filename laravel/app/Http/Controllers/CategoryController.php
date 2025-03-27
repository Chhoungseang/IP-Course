<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories() {
        return Category::all();
    }

    public function getCategory($categoryId) {
        return Category::find($categoryId);
    }

    public function createCategory(Request $request) {
        $id = Category::count() + 1;
        $category = Category::create([
            "name" => $request->get('name'),
        ]);
        $category->save();
        return $category;
    }

    public function updateCategory(Request $request, $categoryId) {
        $category = Category::find($categoryId);
        $category->Category::update($request->all());

        return $category;
    }

    public function deleteCategory($categoryId) {
        $category = Category::find($categoryId);
        $category->delete();
        return $category;
    }

    public function getProductsByCategory($categoryId) {
        $products = Product::where('category_id', str($categoryId))->get();
        return $products;
    }
}