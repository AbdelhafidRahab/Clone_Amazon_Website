@extends('template')

@section('title','Category')
@section('main')
  <div class="min-w-[1150px] bg-gray-100 h-full">
      @include('components.navbar', ['categories' => $categories])



        {{-- <div class="w-full p-1 pt-2 mb-6">
          <div class="text-[27px] font-bold">{{$category->name}}</div>
          <div class="text-sm font-medium">Shop home entertainment, TVs, home audio, headphones, cameras, accessories and more</div>
        </div> --}}

        <div class="border bg-white shadow-md border-gray-300 rounded-lg text-sm py-2 px-4 mb-4">
          1-{{ count($products_of_this_category) }} of over {{ count($products_of_this_category) }} results for <span class="text-[#C45500] font-bold">"{{ $category->name }}"</span>
        </div>

        <div class="grid grid-cols-4 gap-1">
          @foreach ($products_of_this_category as $product)
              <div class="m-1">
                @include('components.product', ['product' => $product])
              </div>
          @endforeach
        </div>

      @include('components.recommended', ['random_products' => $random_products])

      @include('components.footer')
  </div>
@endsection

@section('addedScripts')
  <script src="{{url('js/footer.js')}}"></script>
  <script src="{{url('js/navbar.js')}}"></script>
@endsection