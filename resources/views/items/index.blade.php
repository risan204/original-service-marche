@extends('layouts.app')

@section('content')

    <h1>商品一覧</h1>
    
    @include('users.search')

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
                @if(Auth::check())
                    <th>お気に入り</th>
                @else
                @endif
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
                    <td>
                    @if (Auth::check())
                        @if(Auth::user()->is_favorite($item->id))
                            {{-- お気に入り外すボタンのフォーム --}}
                            {!! Form::open(['route' => ['favorites.unfavorite', $item->id], 'method' => 'delete']) !!}
                                 {!! Form::submit('Unfavorite', ['class' => 'btn btn-success btn-sm']) !!}
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
    @endif
@endsection