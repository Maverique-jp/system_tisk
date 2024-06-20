<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品情報詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <section class="text-gray-600 body-font relative">
                    
                    
                    <div class="container px-5 py-12 mx-auto">
                        
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                            

                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="img_path" class="leading-7 text-sm text-gray-600"> 商品画像</label>
                                @if($connects->img_path)
                             <div>
                            <img src="{{ asset($connects->img_path) }}" alt="{{ $connects->product_name }}" class="w-1/2 h-auto mt-4">
                            </div>
                            @else
                                <p>画像がありません。</p>
                            @endif
                                    </div>
                            </div>

                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="product_name" class="leading-7 text-sm text-gray-600"> 商品名</label>
                                <div  class="w-full  bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$connects->product_name}}</id>
                            </div>
                            </div>

                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="category" class="leading-7 text-sm text-gray-600"> カテゴリー</label>
                                <div  class="w-full  bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $category }}</id>
                            </div>
                            </div>
                            
                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600"> 価格</label>
                                <div  class="w-full  bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">￥{{$connects->price}}</id>
                            </div>
                            </div>

                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="stock" class="leading-7 text-sm text-gray-600"> 在庫数</label>
                                <div  class="w-full  bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$connects->stock}}</id>
                            </div>
                            </div>
                           
                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="comment" class="leading-7 text-sm text-gray-600">コメント</label>
                                @if($connects->comment)
                                <textarea  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{$connects->comment}}</textarea>
                                @endif
                            </div>
                            </div>
                            <div class="flex space-x-5">
                                <form method="get" action="{{ route('management.edit', ['id' => $connects->id]) }}">
                                    <div class="p-2">
                                        <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-black font-bold py-2 px-4 rounded h-12 leading-6 w-32">
                                            編集
                                        </button>
                                    </div>
                                </form>
                                <form method="get" action="{{ route('management.index') }}">
                                    <div class="p-2">
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
