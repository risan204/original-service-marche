<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Storage;
use Illuminate\Support\Facades\Validator;
use Mail;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        //検索
        $query = Item::query();
        
        $keyword = $request->name;
        
        if ($keyword) {
            $query->where('name', $keyword);
            $query->orwhere('area', $keyword);
        }
        
        //データ取得
        $items = $query->orderBy('updated_at', 'desc')->paginate(10);
        
        //商品一覧ビューでそれらを表示
        return view('items.index', [
            'items' => $items,
        ]);
    }
    

    //新規登録処理
    public function store(Request $request)
    {
        $item =new Item;
        
        // バリデーション
        $inputs=request()->validate([
            'name' => 'required|max:50',
            'size' => 'required|max:10',
            'area' => 'required|max:10',
            'quantity' => 'required|max:5',
            'price' => 'required|max:10',
            'stock' => 'required|max:5',
            'file'=>'required|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        //s3に画像を保存。第一引数はs3のディレクトリ 第二引数は保存するファイル
        //第三引数はファイルの公開設定
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        //アップロードした画像のフルパスを取得
        $item->image_path = Storage::disk('s3')->url($path);
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->items()->create([
            //'item_id' => $request->item_id,
            'file' => $path,
            'name' => $request->name,
            'size' => $request->size,
            'area' => $request->area,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    public function disp()
    {
        $path = Storage::disk('s3')->url('hoge.jpg');
        return view('disp', compact('path'));
    }
    
    //新規登録画面表示
    public function create()
    {
        $item = new Item;
        
        //商品一覧ページを表示
        return view('items.create',[
            'item' => $item,
        ]);
    }
     
    //取得表示
    public function show($id)
    {
        // idの値で商品を検索して取得
        $item = Item::findOrFail($id);

        // ユーザ詳細ビューでそれらを表示
        return view('items.show', [
            'item' => $item,
        ]);
    }
    
    //更新画面処理
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $item = Item::findOrFail($id);
        
        //商品ページ編集ビューを表示
        return view('items.edit',[
            'item' => $item,
        ]);
        
        //トップページへリダイレクト
        return redirect('/');
    }
    
    //更新処理
    public function update(Request $request, $id)
    {
        // idの値でメッセージを検索して取得
        $item = Item::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を更新
        if (\Auth::id() === $item->user_id) {
        $item->name = $request->name;
        $item->size = $request->size;
        $item->quantity = $request->quantity;
        $item->price = $request->price;
        $item->area = $request->area;
        $item->stock = $request->stock;
        
        
        $item->save();
        
        //トップページへリダイレクト
        return redirect('/');
        }
    }
    
    //削除処理
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $item = \App\Item::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $item->user_id) {
            $item->delete();
        }

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    //購入画面表示
    public function buy($id)
    {
      // idの値でメッセージを検索して取得
        $item = Item::findOrFail($id);
        
        // 購入画面ビューでそれらを表示
        return view('items.buy', [
            'item' => $item,
        ]);
    }
    
    //購入処理
    public function purchase(Request $request,$id)
    {
        // idの値でメッセージを検索して取得
        $item = Item::findOrFail($id);
        
        //バリデーション
        $inputs= request()->validate([
            'purchase_number' => 'required|max:'.$item->stock,
        ]);

        // 認証済みユーザ（閲覧者）が購入（リクエストされた値をもとに作成）
        $request->user()->purchase($id, $request->purchase_number);
        
        // 投稿を更新
        $item->stock = $item->stock - $request->purchase_number;
        $item->save();

        Mail::send('emails.confirmation',[], function($message){
          $message->to('rnrnrnrn.0518@gmail.com', 'Test')
                   ->subject('購入完了！');
        });
        
        //ありがとうページにリダイレクトする
        return view('items.thankyou');
        
    }
}