@extends('layouts.app')

@section('content')

    <h1>id = {{ $item->item_id }} のメッセージ詳細ページ</h1>

    <table class="table table-bordered">
        
        <tr>
            <th>商品ID</th>
            <td>{{ $item->item_id }}</td>
        </tr>
        <tr>
            <th>商品画像</th>
            <td>{{ $item->file }}</td>
        </tr>
        <tr>
            <th>商品名</th>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <th>サイズ</th>
            <td>{{ $item->size }}</td>
        </tr>
        <tr>
            <th>数量</th>
            <td>{{ $item->quantity }}</td>
        </tr>
        <tr>
            <th>価格</th>
            <td>{{ $item->price }}</td>
        </tr>
        <tr>
            <th>産地</th>
            <td>{{ $item->area }}</td>
        </tr>
        <tr>
            <th>在庫</th>
            <td>{{ $item->stock }}</td>
        </tr>
    </table>

@endsection