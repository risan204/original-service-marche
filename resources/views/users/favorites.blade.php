@extends('layouts.app')

@section('content')

<h2>Myお気に入り一覧</h2>
    <div class="row">
            {{-- お気に入り一覧 --}}
            @include('items.favorites')
    </div>
@endsection