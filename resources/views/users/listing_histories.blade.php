@extends('layouts.app')

@section('content')

<h2>出品履歴</h2>
    <div class="row">
            {{-- 出品履歴 --}}
            @include('items.listing_histories')
    </div>
@endsection