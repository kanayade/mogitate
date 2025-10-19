<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

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
            $path = $request->file('image')->store('products', 'public');
        }
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
        ]);
        return redirect('/products');
    }
    // public function edit($id)
    // {
    //     $product = Product::findOrFail($id);
    //     return view('edit',compact('product'));
    // }
    // public function update(ProductRequest $request,$id)
    // {
    //     $product = Product::findOrFail($id);
    //     if ($request->hasFile('image')) {
    //         $path = $request->file('image')->store('products', 'public');
    //         $product->image_path = $path;
    //     }
    //     $product->name = $request->name;
    //     $product->price = $request->price;
    //     $product->description = $request->description;
    //     $product->season = json_encode($request->season ?? [] );
    //     $product->save();

    //     return redirect('/products');
    // }
    // public function destroy($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $product->delete();
    //     return redirect('/products');
    // }
}
