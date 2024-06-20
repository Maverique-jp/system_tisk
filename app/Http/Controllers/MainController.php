<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\companies;
use App\Models\sales;
use App\Http\Requests\StoreConnectRequest;
use Illuminate\Support\Facades\DB;
use Exception;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$connects=products::select('row_number','product_name','price','stock','category',)->get();
        $connects = DB::table('products')
        ->select('id', 'product_name', 'price', 'stock', 'category', 'img_path',
            DB::raw('ROW_NUMBER() OVER (ORDER BY id) as row_number'))
        ->get();

        

        $category = [
            1 => '飲料',
            2 => '食品',
            3 => '菓子',
            4 => '日用品',
            5 => '衣料品',
            6 => '家電製品',
            7 => '文房具',
            8 => '書類・雑誌',
            9 => '医薬品',
            10 => '化粧品',
            11 => '玩具・ゲーム',
            12 => 'スポーツ用品',
            13 => 'ペット用品',
            14 => '家具・インテリア',
            15 => '園芸用品',
            16 => '自動車用品',
            17 => 'キッチン用品',
            18 => '生活雑貨'
        ];

        // カテゴリIDをカテゴリ名に変換して配列に追加
        foreach ($connects as $product) {
            $product->category = $category[$product->category] ?? '不明';
        }

       return view('management.index',compact('connects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConnectRequest $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|integer',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'comment' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        DB::beginTransaction();
    
        try {
            // 画像ファイルの取得と保存
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                $image->storeAs('public/images', $file_name);
                $image_path = 'storage/images/' . $file_name;
            } else {
                $image_path = null;
            }
    
            // データベースに保存
            $product = Products::create([
                'product_name' => $request->product_name,
                'category' => $request->category,
                'price' => $request->price,
                'stock' => $request->stock,
                'comment' => $request->comment,
                'img_path' => $image_path,
            ]);
    
            DB::commit();
    
            return to_route('management.index');

        } catch (Exception $e) {
            DB::rollBack();
            
            // エラーログを記録
            \Log::error('商品の登録中にエラーが発生しました: ' . $e->getMessage());
            
            // エラーメッセージ
            return back()->withErrors(['error' => '商品の登録中にエラーが発生しました。'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $connects = products::find($id);

        if($connects->category === 1 ){ $category = '食品'; }
        if($connects->category === 2 ){ $category = '飲料'; }
        if($connects->category === 3 ){ $category = '菓子'; }
        if($connects->category === 4 ){ $category = '日用品'; }
        if($connects->category === 5 ){ $category = '衣料品'; }
        if($connects->category === 6 ){ $category = '家電製品'; }
        if($connects->category === 7 ){ $category = '文房具'; }
        if($connects->category === 8 ){ $category = '書類・雑誌'; }
        if($connects->category === 9 ){ $category = '医薬品'; }
        if($connects->category === 10 ){ $category = '化粧品';}
        if($connects->category === 11 ){ $category = '玩具・ゲーム'; }
        if($connects->category === 12 ){ $category = 'スポーツ用品'; }
        if($connects->category === 13 ){ $category = 'ペット用品'; }
        if($connects->category === 14 ){ $category = '家具店インテリア'; }
        if($connects->category === 15 ){ $category = '園芸用品'; }
        if($connects->category === 16 ){ $category = '自動車用品'; }
        if($connects->category === 17 ){ $category = 'キッチン用品'; }
        if($connects->category === 18 ){ $category = '生活雑貨'; }
        
        return view('management.show', compact('connects','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $connects = products::find($id);
        return view('management.edit', compact('connects'));
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
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|integer',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'comment' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $connects = Products::find($id);
        $connects->product_name = $request->product_name;
        $connects->category = $request->category;
        $connects->price = $request->price;
        $connects->stock = $request->stock;
        $connects->comment = $request->comment;
    
        // 画像のアップロードと保存
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            $image->storeAs('public/images', $file_name);
            $image_path = 'storage/images/' . $file_name;
            $connects->img_path = $image_path;
        }
    
        $connects->save();
    
        return redirect()->route('management.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $connects = products::find($id);
        $connects->delete();
        return to_route('management.index');
    }

   
    
}
