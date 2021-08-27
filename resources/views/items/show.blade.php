@extends('layouts.app')

@section('content')

    <table class="table table-bordered">
        <tr>
            <th>写真</th>
            <td><img src="https://risanbucket.s3-ap-northeast-1.amazonaws.com/{{ $item->file }}" width="400px"></td>
                        @csrf
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
    
    {!! link_to_route('items.create', '購入する', [], ['class' => 'btn btn-success']) !!}

@endsection