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
    public function create(ProductRequest $request)
    {
        $form = $request->all();
        Product::create($form);
        return redirect('/products');
    }
}
