<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザが所有する投稿。（ Itemモデルとの関係を定義）
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
        /**
     * このユーザに関係するモデルの件数をロードする。☆
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount(['items' , 'favorites']);
    }
    
    //このユーザーがお気に入り登録した投稿。（Itemモデルとの関係を定義）
    public function favorites()
    {
        return $this->belongsToMany(Item::class,'favorites','user_id','item_id')->withTimestamps();
    }
    
    public function favorite($itemId)
    {
        //すでにお気に入りしているかの確認
        $exist = $this->is_favorite($itemId);
        
        if($exist) {
            //すでにお気に入りしていれば何もしない
            return false;
        } else {
            //お気に入り外であれば追加
            $this->favorites()->attach($itemId);
            return true;
        }
    }
    
    public function unfavorite($itemId)
    {
        //すでにお気に入りしているかの確認
        $exist = $this->is_favorite($itemId);
        
        if($exist){
            //すでにお気に入りしていれば外す
            $this->favorites()->detach($itemId);
            return true;
        } else {
            //お気に入りしていなければ何もしない
            return false;
        }
    }
    
    public function is_favorite($itemId)
    {
        //お気に入りしている投稿の中に$itemIdが存在するか
        return $this->favorites()->where('item_id', $itemId)->exists();
    }
}
