@extends('layouts.app')

@section('content')
<div class="edit_container">
    <a href="/products">商品一覧</a>
    <h3 class="fruits_name">{{ $product->name }}</h3>
    <form class="edit_form" action="{{ url('/products/' . $product->id .'/update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="fruits_detail">
            <div class="fruits_image">
                <img src="{{ asset('storage/app/public/image' . $product->image) }}" alt="{{ $product->name }}">
                <form action="products/update" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="file" name="image">
            </div>
            <div class="form__group">
                <div class="form__label--title">
                    <label class="fruits_name">商品名</label>
                    <input type="text" name="name" value="{{ old('name',$product->name) }}">
                </div>
                <div class="form__label--title">
                    <label class="fruits_price">値段</label>
                    <input type="number" name="price" value="{{ old('price',$product->price) }}">
                </div>
                <div class="form__label--title">
                    <label class="season">季節</label>
                    <label>
                        <input type="checkbox" name="season[]" value="{{ old('season',$product->season) }}">春
                    </label>
                    <label>
                        <input type="checkbox" name="season[]" value="{{ old('season',$product->season) }}">夏
                    </label>
                    <label>
                        <input type="checkbox" name="season[]" value="{{ old('season',$product->season) }}">秋
                    </label>
                    <label>
                        <input type="checkbox" name="season[]" value="{{ old('season',$product->season) }}">冬
                    </label>
                </div>
                <div class="form__label--title">
                    <label class="fruits_info">商品説明</label>
                    <textarea name="description">{{ old('description',$product->description) }}</textarea>
                </div>
            </div>
        </div>
        <div class="edit__button">
            <a href="/products">戻る</a>
            <button class="edit__button--keep" type="submit">変更を保存</button>
        </div>
    </form>
    <form class="delete_form" action="/products" method="post">
        @csrf
        @method('delete')
        <button class="delete__button" type="submit">削除</button>
    </form>
</div>
@endsection