<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのお気に入り追加する
        \Auth::user()->favorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのお気に入り追加を外す
        \Auth::user()->unfavorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}