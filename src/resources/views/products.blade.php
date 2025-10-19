@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="container">
    <aside class="sidebar">
        <div class="sidebar-title">
            <h2>商品一覧</h2>
        </div>
        <form action="products/search" method="get" enctype="multipart/form-data">
        <input type="text" placeholder="商品名で検索"><br><br>
        <button class="search-btn">検索</button><br><br>
        <label>価格順で表示</label><br>
        <select class="search-select">
            <option value="">価格で並べ替え</option>
            <option>安い順</option>
            <option>高い順</option>
        </select>
    </aside>
    <div class="add-button">
        <a href="/register" class="add-button">+ 商品を追加</a>
    </div>
    @foreach ($products as $product)
    <div class="fruits-products">
        <a href="{{ url('/products/' . $product->id) }}">
            <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像">
        </a>
            <h2>{{ $product->name }}</h2>
            <p>¥{{ number_format($product->price) }}</p>
    </div>
    @endforeach
    <div class="pagenation">
        @if ($products->currentPage() > 1)
        <a href="{{ $products->previousPageUrl() }}">←</a>
        @else
        <span>←</span>
        @endif

        @for ($i = 1; $i <= 3; $i++)
        @if ($i == $products->currentPage())
        <strong>{{ $i }}</strong>
        @else
        <a href="{{ $products->url($i) }}">{{ $i }}</a>
        @endif
        @endfor

        @if ($products->currentPage() < $products->lastPage())
        <a href="{{ $products->nextPageUrl() }}">→</a>
        @else
        <span>→</span>
        @endif
    </div>
</div>
@endsection