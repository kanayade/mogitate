@extends('layouts.app')

@section('content')
<div class="edit_container">
    <a href="/products">商品一覧</a>
    <h3 class="fruits_name">>{{ $product->name }}</h3>
    <form class="edit_form" action="/products" method="post" enctype="multipart/form-data">
        <div class="fruits_detail">
            <div class="fruits_image">
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                <form action="products/update" method="post" enctype="multipart/form-data">
                    @csrf
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
                    <label class="season">季節</label><br>
                    @foreach(['春','夏','秋','冬'] as $season)
                    <label>
                    <input type="chechbox" name="season[]" value="{{ $season }}"
                    {{ in_arry($season,json_decode($product->season ?? '[]')) ? 'checked' : ''}}> {{ $season }}</label>
                    @endforeach
                </div>
                <div class="form__label--title">
                    <label class="fruits_info">商品説明</label>
                    <textarea name="description">{{ old('description',$product->description) }}"</textarea>
                </div>
            </div>
        </div>
        <div class="edit__button">
            <a href="/products">戻る</a>
            <button class="edit__button--entry" type="submit">変更を保存</button>
        </div>
    </form>
    <form class="delete_form" action="