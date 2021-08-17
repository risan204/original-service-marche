@extends('layouts.app')

@section('content')

    <h1>商品一覧</h1>

    @if (count($items) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>商品ID</th>
                    <th>商品写真</th>
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
                    <td>{!! link_to_route('items.show', $item->id, ['item' => $item->id]) !!}</td>
                    <td>{{ $item->image_file }}</td>
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


