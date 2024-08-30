@extends('template')

@section('addedStyles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('title','Cart')
@section('main')
    <div class="min-w-[1150px] bg-gray-100 h-full">
        @include('components.navbar')
    




        <div class="flex gap-4 my-4">

          <div class="w-full bg-white p-4">

            <div class="border-b">
              <div class="text-[27px] font-bold">Shopping Cart</div>
              <div class="text-sm w-full flex justify-end items-center font-bold">Price</div>
            </div>

            <div id="cartEmpty" class="text-center font-bold text-2xl py-20">
              Your Amazon Cart is empty
            </div>

            <div id="itemsContainer">

              <div class="flex border-b">

                <img src="" class="h-[180px] my-4">
        
                <div class="flex justify-between mb-4">
                  
                  <div class="pl-8 py-10 relative">
        
                    <div class="text-gray-900 pb-2 -mt-4 font-bold text-[18px]"></div>
        
                    <span></span>
        
                    <div class="text-teal-600 py-2"></div>
        
                    <div id="${item.id}" class="deleteItem text-teal-600 absolute bottom-0 mb-4 flex items-center">
                      <div class="text-sm hover:underline cursor-pointer">
                        
                      </div>
                    </div>
        
                  </div>
        
                  <div class="py-10 justify-end">
                    <div class="font-bold pl-20"></div>
                  </div>
        
                </div>
        
              </div>

            </div>

            <div class="font-extrabold text-[18px] pt-4 text-right">Subtotal &#40;Items: <span class="cartSize"></span>&#41;: $<span class="totalInCart"></span></div>

          </div>

          <div class="bg-white w-[350px] p-4 h-48">

            <div class="text-sm text-green-700">
              Welcom to Amazon! FREE Delivery on your first order to US or UK.
              Select this option on checkout
            </div>

            <div class="font-extrabold text-[18px] pt-4">Subtotal &#40;Items: <span class="cartSize"></span>&#41;: $<span class="totalInCart"></span></div>

            <a href="{{ url($user != null ? '/checkout' : '/login' ) }}" id="proceedToCheckout" class="block mt-4 w-full text-center py-1 font-bold text-sm rounded-lg border shadow-sm cursor-pointer">Proceed to checkout</a> 
            {{-- before go to checkout send the data to store --}}

          </div>

        </div>




    
        @include('components.recommended')
    
        @include('components.footer')
    </div>
@endsection

@section('addedScripts')
    <script src="{{url('js/cart.js')}}"></script>
    <script src="{{url('js/footer.js')}}"></script>
    <script src="{{url('js/navbar.js')}}"></script>
@endsection