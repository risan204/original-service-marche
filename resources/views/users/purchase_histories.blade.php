@extends('layouts.app')

@section('content')

<h2>購入履歴</h2>
    <div class="row">
            {{-- 購入履歴 --}}
            @include('items.purchase_histories')
    </div>
@endsection