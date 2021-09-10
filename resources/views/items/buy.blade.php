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
            <th>販売在庫</th>
            <td>{{ $item->stock }}セット</td>
        </tr>
    </table>
    
    <p style="padding-top:15px;">{!! Form::model($item, ['route' => ['items.purchase',$item->id]]) !!}
            <div class="form-group row">
            <div class="col-sm-3">{!! Form::label('purchase_number', '購入数:') !!}</div>
            <div class="col-sm-4">{!! Form::number('purchase_number', null, ['class' => 'form-control']) !!}</div>
            <div class="col-sm-3">セット</div>
            </div>
    {!! Form::submit('購入する', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
    </p>
    <div class="explanetion">
    ※購入後メールが届きますので決済方法、送付先等ご指定下さい。
    </div>
@endsection