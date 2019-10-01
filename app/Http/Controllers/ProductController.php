<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController
{
    public function index()
    {
        $products = DB::table('products')->paginate(10);
        $categories = Category::all();

        return view('products.products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function store()
    {

    }

    public function create()
    {

    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        return view('products.product', [
            'product' => $product
        ]);
    }

    public function update($productId, Request $request)
    {
        $product = Product::findOrFail($productId);

        $product->name = request('name');
        $product->category_id = request('category_id');
        $product->description = request('description');
        $product->price = request('price');

        $product->save();

        return redirect('/products');
    }

    public function destroy($productId, \Request $request)
    {
        Product::findOrFail($productId)->delete();

        return redirect('/products');

    }

    public function edit($productId, \Request $request)
    {
        $product = Product::findOrFail($productId);

        return (view('edit', compact('product')));
    }
}
