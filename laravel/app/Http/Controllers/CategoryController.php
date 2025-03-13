<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function getCategories() {
        return Category::all();
    }

    public function getCategory($categoryId) {
        return Category::find($categoryId);
    }

    public function createCategory() {
        $id = Category::count() + 1;
        date_default_timezone_set("Asia/Phnom_Penh");
        $when = date("d/m/Y h:i:sa");
        $category = Category::create([
            "name" => "New Category $id $when",
        ]);
        $category->save();
        return $category;
    }

    public function updateCategory($categoryId) {
        $category = Category::find($categoryId);
        date_default_timezone_set("Asia/Phnom_Penh");
        $when = date("d/m/Y h:i:sa");
        $category->name = "Category $categoryId updated on $when";
        $category->save();

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