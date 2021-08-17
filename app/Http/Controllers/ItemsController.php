<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Storage;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    public function index()
    {
        //昇順に並べる
        $items = Item::orderBy('updated_at', 'desc')->paginate(10);
        
        //商品一覧ビューでそれらを表示
        return view('items.index', [
            'items' => $items,
        ]);
    }

    //新規登録処理
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:50',
            'size' => 'required|max:10',
            'area' => 'required|max:10',
            'quantity' => 'required|max:5',
            'price' => 'required|max:10',
            'stock' => 'required|max:5'
            
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->items()->create([
            'item_id' => $request->item_id,
            'image_file' => $request->image_file,
            'name' => $request->name,
            'size' => $request->size,
            'area' => $request->area,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        
        //Validatorファサードのmakeメソッドの第１引数は、バリデーションを行うデータ。
        //第２引数はそのデータに適用するバリデーションルール
         $validator = Validator::make($request->all(), [
            'file' => 'required|max:10240|mimes:jpeg,gif,png'
         ]);
        //上記のバリデーションがエラーの場合、ビューにバリデーション情報を渡す
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        //s3に画像を保存。第一引数はs3のディレクトリ。第二引数は保存するファイル。
        //第三引数はファイルの公開設定。
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        //カラムに画像のパスとタイトルを保存
        Item::create([
            'image_file_name' => $path,
        ]);

        return redirect('/');

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    //新規登録画面表示
    public function create()
    {
        //
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
        
        //商品ページ作成編集削除ビューを表示
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
        $item->item_id = $request->item_id;
        $item->price = $request->price;
        $item->quantity = $request->quantity;
        $item->save();
        
        //トップページへリダイレクト
        return redirect('/');
        }
    }
    
    //削除処理
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $item = Item::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $item->user_id) {
            $item->delete();
        }

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}