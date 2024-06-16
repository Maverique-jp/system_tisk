<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\companies;
use App\Models\sales;
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
        $connects=products::select('id','product_name','price','stock','company_id',)->get();
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
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'company_id' => 'required|integer',
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
                'company_id' => $request->company_id,
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
        return view('management.show', compact('connects'));
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
            'company_id' => 'required|integer',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'comment' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $connects = Products::find($id);
        $connects->product_name = $request->product_name;
        $connects->company_id = $request->company_id;
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
