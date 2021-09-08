@extends('layouts.app')

@section('content')

    <h1>出品履歴</h1>

    @if (count($items) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>詳細リンク</th>
                    <th>写真</th>
                    <th>商品名</th>
                    <th>サイズ</th>
                    <th>数量</th>
                    <th>価格</th>
                    <th>産地</th>
                    <th>在庫</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{!! link_to_route('items.show', '■',['item'=>$item->id]) !!}</td>
                    <td><img src="https://risanbucket.s3-ap-northeast-1.amazonaws.com/{{ $item->file }}" width="100px"></td>
                        @csrf
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>¥{{ $item->price }}</td>
                    <td>{{ $item->area }}</td>
                    <td>{{ $item->stock }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection