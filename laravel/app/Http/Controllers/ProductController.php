<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct($productId) {
        $product = Product::find($productId);
        return $product;
    }

    public function getProducts() {
        return Product::all();
    }

    public function createProduct() {
        date_default_timezone_set("Asia/Phnom_Penh");
        $when = date("d/m/Y h:i:sa");

        $cat_id = Product::count() % 2 + 1;

        $product = Product::create([
            "name" => "New Product $when",
            "category_id" => str($cat_id),
            "pricing" => 420,
        ]);
        $product->save();
        return $product;
    }

    public function updateProduct($productId) {
        date_default_timezone_set("Asia/Phnom_Penh");
        $when = date("d/m/Y h:i:sa");
        $product = Product::create([
            "name" => "Product $productId updated on $when",
        ]);
        $product->save();
        return $product;
    }

    public function deleteProduct($productId) {
        $product = Product::find($productId);
        $product->delete();
        return $product;
    }

}