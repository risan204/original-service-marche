<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    //ユーザーのお気に入り一覧を表示するアクション。
    public function favorites()
    {
        // idの値でユーザを検索して取得
        $user = \Auth::user();
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザの投稿一覧を作成日時の降順で取得
        $items = $user->favorites()->orderBy('created_at', 'desc')->paginate(10);
        
        // ユーザのお気に入り一覧を取得
        $favorites = $user->favorites()->orderBy('created_at','desc')->paginate(10);
        
        // お気に入り一覧でそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'favorites' => $favorites,
            'items' => $items,
        ]);
    }
    
    //購入履歴を表示するアクション。
    public function purchase_histories()
    {
        // idの値でユーザを検索して取得
        $user = \Auth::user();
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザの投稿一覧を作成日時の降順で取得
        $items = $user->purchase_histories()->orderBy('created_at', 'desc')->paginate(10);
        
        // 購入履歴でそれらを表示
        return view('users.purchase_histories', [
            'user' => $user,
            'items' => $items,
        ]);
    }
    
    //出品履歴を表示するアクション。
    public function listing_histories()
    {
        // idの値でユーザを検索して取得
        $user = \Auth::user();
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザの出品一覧を作成日時の降順で取得
        $items = $user->listing_histories()->orderBy('created_at', 'desc')->paginate(10);
        
        // 出品履歴でそれらを表示
        return view('users.listing_histories', [
            'user' => $user,
            'items' => $items,
        ]);
    }
}
