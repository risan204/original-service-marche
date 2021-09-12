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
            <th>梱包数</th>
            <td>{{ $item->quantity }}個</td>
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
            <th width="190">生産者からのコメント</th>
            <td>{!! nl2br(e( $item->comment )) !!}</td>
        </tr>
        <tr>
            <th>在庫</th>
            <td>{{ $item->stock }}セット</td>
        </tr>
    </table>
    
    <p>{!! link_to_route('items.buy', '購入ページへ', ['id'=>$item->id], ['class' => 'btn btn-success']) !!}</p>
    <br>
    {{-- メッセージ編集ページへのリンク --}}
    <table>
      <tr>
        <td>@if (Auth::id() == $item->user_id)
        <div style="padding-right:20px;">{!! link_to_route('items.edit', '商品詳細編集', ['item' => $item->id], ['class' => 'btn btn-light']) !!}</div>
        </td>
        <td>
        {{-- メッセージ削除 --}}
        {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
          {!! Form::submit('商品削除', ['class' => 'btn btn-light']) !!}
        {!! Form::close() !!}
        </td>
      </tr>
    </table>
            @endif
@endsection