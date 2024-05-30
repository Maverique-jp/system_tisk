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
                <section class="text-gray-600 body-font relative">
                    <form method="post" action="{{ route('management.update',['id' => $connects->id]) }}">
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
                                <label for="company_id" class="leading-7 text-sm text-gray-600"> メーカー名</label>
                                <input type="text" id="company_id" name="company_id" value="{{ $connects->company_id }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
