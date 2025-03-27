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

    public function createProduct(Request $request) {

        $cat_id = Product::count() % 2 + 1;

        $product = Product::create([
            "name" => $request->get('name'),
            "category_id" => $request->get('category_id'),
            "pricing" => $request->get('pricing'),
        ]);
        $product->save();
        return $product;
    }

    public function updateProduct(Request $request, $productId) {
        $product = Product::find($productId);
        $product->Product::update($request->all());

        return $product;
    }

    public function deleteProduct($productId) {
        $product = Product::find($productId);
        $product->delete();
        return $product;
    }

}