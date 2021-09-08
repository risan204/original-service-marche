<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Listing_historiesController extends Controller
{
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、出品した一覧を表示する
        \Auth::user()->create($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}