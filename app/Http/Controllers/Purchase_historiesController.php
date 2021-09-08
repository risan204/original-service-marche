<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Purchase_historiesController extends Controller
{
    public function purchase($id)
    {
        // 認証済みユーザ（閲覧者）が、商品購入した一覧を表示する
        \Auth::user()->buy($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}