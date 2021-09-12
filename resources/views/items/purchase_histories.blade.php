@extends('layouts.app')

@section('content')

    <h1>購入履歴</h1>

    @if (count($items) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>写真</th>
                    <th>商品名(詳細ページ)</th>
                    <th>サイズ</th>
                    <th>梱包数</th>
                    <th>価格</th>
                    <th>生産者からのコメント</th>
                    <th>産地</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td><img src="https://risanbucket.s3-ap-northeast-1.amazonaws.com/{{ $item->file }}" width="100px"></td>
                        @csrf
                    <td>{!! link_to_route('items.show', $item->name ,['item'=>$item->id]) !!}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->quantity }}個</td>
                    <td>¥{{ $item->price }}</td>
                    <td>{{ Str::limit($item->comment, 20 , '....' ) }}</td>
                    <td>{{ $item->area }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else<p style="font-size:25px;">対象の商品がありません。</p>
    @endif
@endsection