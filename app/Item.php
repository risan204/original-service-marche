<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //後に、edit()メソッドで保存するカラムを指定
    protected $fillable = ['item_id','image_file','name','size','area','quantity','price','stock'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}