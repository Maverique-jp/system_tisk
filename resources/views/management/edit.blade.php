<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品情報編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <section class="text-gray-600 body-font relative">
                    <form method="post" action="{{ route('management.update',['id' => $connects->id]) }}" enctype="multipart/form-data">
                        @csrf
                    
                    <div class="container px-5 py-12 mx-auto">
                    
                        
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="product_name" class="leading-7 text-sm text-gray-600"> 商品名</label>
                                <input type="text" id="product_name" name="product_name" value="{{ $connects->product_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            </div>

                            <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="category" class="leading-7 text-sm text-gray-600">カテゴリー</label>
                                                <select name="category">
                                                <option value="">選択してください</option>
                                                    <option value="1" @if($connects->category ==1) selected @endif>飲料</option>
                                                    <option value="2" @if($connects->category ==2) selected @endif>食品</option>
                                                    <option value="3" @if($connects->category ==3) selected @endif>菓子</option>
                                                    <option value="4" @if($connects->category ==4) selected @endif>日用品</option>
                                                    <option value="5" @if($connects->category ==5) selected @endif>衣料品</option>
                                                    <option value="6" @if($connects->category ==6) selected @endif>家電製品</option>
                                                    <option value="7" @if($connects->category ==7) selected @endif>文房具</option>
                                                    <option value="8" @if($connects->category ==8) selected @endif>書籍・雑誌</option>
                                                    <option value="9" @if($connects->category ==9) selected @endif>医薬品</option>
                                                    <option value="10" @if($connects->category ==10) selected @endif>化粧品</option>
                                                    <option value="11" @if($connects->category ==11) selected @endif>玩具・ゲーム</option>
                                                    <option value="12" @if($connects->category ==12) selected @endif>スポーツ用品</option>
                                                    <option value="13" @if($connects->category ==13) selected @endif>ペット用品</option>
                                                    <option value="14" @if($connects->category ==14) selected @endif>家具・インテリア</option>
                                                    <option value="15" @if($connects->category ==15) selected @endif>園芸用品</option>
                                                    <option value="16" @if($connects->category ==16) selected @endif>自動車用品</option>
                                                    <option value="17" @if($connects->category ==17) selected @endif>キッチン用品</option>
                                                    <option value="18" @if($connects->category ==18) selected @endif>生活雑貨</option>
                                                </select>    
                                            </div>
                                        </div>

                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600"> 価格</label>
                                <input type="text" id="price" name="price" value="{{ $connects->price }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            </div>

                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="stock" class="leading-7 text-sm text-gray-600"> 在庫数</label>
                                <input type="text" id="stock" name="stock" value="{{ $connects->stock }}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            </div>

                            <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                                <input type="file" id="image" name="image"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                           
                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="comment" class="leading-7 text-sm text-gray-600">コメント</label>
                                <textarea id="comment" name="comment"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $connects->comment }}</textarea>
                            </div>
                            </div>
                            <div class="flex space-x-5">
                                <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-black font-bold py-2 px-4 rounded h-12 leading-6 w-32">更新</button>
                                </form>

                                <form method="get" action="{{ route('management.show',['id' => $connects->id ]) }}">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded h-12 leading-6 w-32">
                                            戻る
                                        </button>
                                    </div>
                                </form>
                           
                        </div>
                        </div>
                    </div>
                

                </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
