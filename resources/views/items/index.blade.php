@extends('layouts.app')

@section('content')
    
    @include('users.search')

    @if (count($items) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>写真</th>
                    <th>商品名(詳細ページ)</th>
                    <th>サイズ</th>
                    <th>梱包数</th>
                    <th>価格</th>
                    <th>産地</th>
                    <th>販売在庫</th>
                @if(Auth::check())
                    <th>お気に入り</th>
                @else
                @endif
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
                    <td>{{ $item->area }}</td>
                    <td>{{ $item->stock }}セット</td>
                    <td>
                    @if (Auth::check())
                        @if(Auth::user()->is_favorite($item->id))
                            {{-- お気に入り外すボタンのフォーム --}}
                            {!! Form::open(['route' => ['favorites.unfavorite', $item->id], 'method' => 'delete']) !!}
                                 {!! Form::submit('Unfavorite', ['class' => 'btn btn-secondary btn-sm']) !!}
                            {!! Form::close() !!}
                        @else
                            {{-- 　お気に入りボタンのフォーム --}}
                            {!! Form::open(['route' => ['favorites.favorite', $item->id], 'method' => 'post']) !!}
                            {!! Form::submit('Favorite', ['class' => 'btn btn-light btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else<p style="font-size:25px;">対象の商品がありません。</p>
    @endif
@endsection