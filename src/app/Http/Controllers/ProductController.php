<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
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
        $seasons = Season::all();
        return view('register',compact('seasons'));
    }

    public function store(ProductRequest $request)
    {
        $form = $request->all();
        if ($request->hasFile('image')) {
            $form['image']= $request->file('image')->store('product','public');
        }
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image
        ]);
        return redirect('/products');
    }

    public function edit($productId)
    {
        $product = Product::with('seasons')->find($productId);
        $seasons = Season::all();
        return view('edit',compact('product','seasons'));
    }

    public function update(UpdateRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product','public');
            $product->update(['image' => $path]);
        }
        $product->seasons()->sync($request->seasons ?? []);
        return redirect('/products');
    }
}