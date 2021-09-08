@extends('layouts.app')
@section('content')
<p>ご注文いただきありがとうございます！</p>
<p>メールを送信させていただきました。そちらで引き続きお手続きください。</p>
{!! link_to_route('items.index', '戻る', [], ['class' => 'btn btn-success']) !!}
@endsection