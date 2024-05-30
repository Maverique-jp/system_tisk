<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    
                <a href="{{ route('management.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">新規登録</a>
                
        <table class="table-auto w-full text-left whitespace-no-wrap my-5 ">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">id</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">商品画像</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">商品名</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">価格</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">在庫数</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メーカー名</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"><a href="{{ route('management.create') }}" class="bg-orange-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded ">新規登録</a>
                </th>
        </tr>
        </thead>
        <tbody>
          @foreach($connects as $connects)
          <tr>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $connects->id}}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">商品画像</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $connects->product_name}}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $connects->price}}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $connects->stock}}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $connects->company_id}}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3"><a class="bg-blue-500 hover:bg-blue-700 text-black  py-0.5 px-1.5 rounded" href="{{ route('management.show',['id' => $connects->id ]) }}">詳細</a></td>
          </tr>
          @endforeach
         </tbody>
      </table>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
