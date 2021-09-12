@extends('layouts.app')

@section('content')

    <h1>商品を出品する</h1>
    <br>
    
        {{-- 商品登録ページへのリンク --}}
                <div class="form-group row">
                    <div class="col-sm-3">{!! Form::label('file', '商品写真添付:') !!}</div>
                    
                <div class="col-sm-9"><form action="{{ action('ItemsController@store') }}" method="post" enctype="multipart/form-data">
                <!-- アップロードフォームの作成 -->
                <input type="file" name="file">
                </div>
                </div>
                @csrf
                <div class="form-group row">
                    <div class="col-sm-3">{!! Form::label('name', '商品名:') !!}</div>
                    <div class="col-sm-9">{!! Form::text('name', null, ['class' => 'form-control']) !!}</div>
                </div>               
                <div class="form-group row">
                    <div class="col-sm-3">{!! Form::label('price', '金額:') !!}</div>
                    <div class="col-sm-9">{!! Form::text('price', null, ['class' => 'form-control']) !!}</div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">{!! Form::label('size', 'サイズ:') !!}</div>
                    <div class="col-sm-9">{!! Form::text('size', null, ['class' => 'form-control']) !!}</div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">{!! Form::label('quantity', '梱包数:') !!}</div>
                    <div class="col-sm-9">{!! Form::number('quantity', null, ['class' => 'form-control']) !!}</div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">{!! Form::label('area', '産地:') !!}</div>
                    <div class="col-sm-9">{!! Form::text('area', null, ['class' => 'form-control']) !!}</div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">{!! Form::label('stock', '在庫:') !!}</div>
                    <div class="col-sm-9">{!! Form::number('stock', null, ['class' => 'form-control']) !!}</div>
                </div>
                <div class="offset-3 col-sm-9">{!! Form::submit('出品する', ['class' => 'btn btn-secondary btn-block']) !!}</div>
            {!! Form::close() !!}
            </div>
           
    
@endsection