<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('products',compact('products'));
    }
    public function add()
    {
        return view('register');
    }
    public function store(ProductRequest $request)
    {
        $form = $request->all();
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public', 'product');
        }
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
        ]);
        return redirect('/products');
    }
    public function edit($productId)
    {
        $product = Product::find($productId);
        return view('edit',compact('product'));
    }
    public function update(UpdateRequest $request, $productId)
    {
        $form = $request->all();
        unset($form['_token']);
        Product::find($productId)->update($form);
        return redirect('/products');
    }
}