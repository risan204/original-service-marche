@extends('layouts.app')

@section('content')

    <h1>出品・管理する</h1>

    <div class="row">
        {{-- 商品登録ページへのリンク --}}
        <div class="col-6">
            {!! Form::open(['route' => 'items.store']) !!}
            　　<h2>商品登録</h2>
                <div class="form-group">
                    {!! Form::label('file', '画像投稿', ['class' => 'control-label']) !!}
                    {!! Form::file('file') !!}
　              </div>
                <div class="form-group">     　　
                    {!! Form::label('name', '商品名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', '金額:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('size', 'サイズ:') !!}
                    {!! Form::text('size', null, ['L' => 'Large', 'M' => 'Midium', 'S' => 'Small']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('quantity', '数量:') !!}
                    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('area', '産地:') !!}
                    {!! Form::text('area', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('stock', '在庫:') !!}
                    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('出品する', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            </div>
            {{-- 商品編集ページへのリンク --}}
            <div class="col-6">
            {!! Form::open(['route' => ['items.update' , $item->id ], 'method' => 'put']) !!}
            <h2>商品編集</h2>
            <div class="form-group">
                    {!! Form::label('user_id', '商品ID:') !!}
                    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('stock', '在庫:') !!}
                    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('price', '金額:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('編集する', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            </div>
            
            {{-- 商品削除フォーム --}}
            <div class="col-6">
            {!! Form::open( ['route' => ['items.destroy' , $item->id], 'method' => 'delete']) !!}
            <h2>商品削除</h2>
            <div class="form-group">
                    {!! Form::label('user_id', '商品ID:') !!}
                    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('削除する', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
