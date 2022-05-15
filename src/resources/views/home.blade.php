<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
           
    <div class="container mx-auto items-center text-center mb-3">
            <div class="search-container py-6"></div>
              <h1 class="font-bold text-2xl text-green-700 pb-3"> Welcome to our Store</h1>
                <form action="{{ route('search',['page'=>0]) }}" id="search-form" method="GET">
                    <input type="text" name="search" id="search" class="focus:outline-none border border-green-500 w-96 p-3 rounded text-gray-700" placeholder="search our products" value="{{ $_GET['search'] ?? '' }}">
                    <button type="submit" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-3 px-4 border border-green-500 hover:border-transparent rounded">Search</button>
                </form> 
            </div>
      <div class="my-6 w-3/4 mx-auto">
        @if(is_countable($result))
        @if(!isset($_GET['page']))
          <?php $page = 1; ?>
        @endif
          <?php $i = ($page-1) * 10 + 1;?>
          @foreach($result as $item)
            
            <div class="my-1 border border-gray-300 w-auto text-left pl-3 bg-green-50 hover:bg-green-200 hover:text-gray-500 hover:cursor-pointer"> {{ $i++ . ' - ' . $item->name }} </div>
          @endforeach
        @else
          {{ $result }}
        @endif
        
      </div>
      <div class="container mx-auto items-center text-center">
      <a href="{{ route('search',['search'=>$_GET['search'] ?? '','page'=> $page ]) }}"><button type="button" class="bg-transparent hover:bg-green-500 text-green-500 font-semibold hover:text-white py-1 px-2 border border-green-500 hover:border-transparent rounded">load more</button</a>
        </div>
    </div>
  
</x-app-layout>