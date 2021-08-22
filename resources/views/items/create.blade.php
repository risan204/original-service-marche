@extends('layouts.app')

@section('content')

    <h1>商品を出品する</h1>

    <div class="row">
        {{-- 商品登録ページへのリンク --}}
        <div class="col-6">
                <form action="{{ action('ItemsController@store') }}" method="post" enctype="multipart/form-data">
                <!-- アップロードフォームの作成 -->
                <input type="file" name="file">
                @csrf
                <br>
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
                {!! Form::submit('出品する', ['class' => 'btn btn-secondary btn-block']) !!}
            {!! Form::close() !!}
            </div>
            </div>
    </div>
@endsection