@extends('template')

@section('title','Category')
@section('main')
  <div class="min-w-[1150px] bg-gray-100 h-full">
      @include('components.navbar', ['categories' => $categories])


      <div class="mt-16"></div>

      <div class="max-w-[1200px] mx-auto flex gap-4 justify-between mb-4">
        <div class="w-2/5">
          <img src="{{$product->images}}">
        </div>

        <div class="w-2/5">
          <div class="text-xl font-extrabold border-b border-b-gray-300 mb-2 pb-2">{{$product->title}}</div>

          <div>
            <div class="text-lg font-extrabold m-1">About this item</div>
            <div>{{$product->description}}</div>
          </div>

        </div>

        <div class="w-1/5">
          <div class="border border-gray-300 rounded-lg">
            <div class="my-2 mx-3 mb-2">
              <div class="flex flex-col items-center justify-center border-b border-gray-300 pb-1">
                
                <a href="{{ url('/address') }}" class="flex items-center text-xs font-extrabold text-teal-700 hover:text-red-600 cursor-pointer">
                  <i class="fa-solid fa-location-dot mr-2"></i>
                  
                  @if ($user != null)
                    Delivery to 
                    {{$user->first_name}} {{$user->last_name}} - {{$address->postcode}}
                  @else
                    <a href="{{ url('/login') }}" class="flex items-center text-xs font-extrabold text-teal-700 hover:text-red-600 cursor-pointer">
                      SIGN IN
                    </a>
                  @endif
                </a>

              </div>

              <div class="flex items-center justify-between pt-2">
                <div class="text-red-600 text-sm font-bold">${{$product->price}}</div>
                <button class="bg-yellow-400 px-2 font-bold text-sm rounded-lg border shadow-sm cursor-pointer" id="addToCartBtn">
                  <span id="{{$product}}">Add to cart</span>
                </button>
                <span class="font-normal hidden"><i class="fa-solid fa-check mr-1"></i>Item Added</span>
              </div>

            </div>
          </div>
        </div>

      </div>

      
      @include('components.recommended', ['random_products' => $random_products])

      @include('components.footer')
  </div>
@endsection

@section('addedScripts')
  <script src="{{url('js/navbar.js')}}"></script>
  <script src="{{url('js/footer.js')}}"></script>
  <script src="{{url('js/product_show.js')}}"></script>
@endsection