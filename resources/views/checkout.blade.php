@extends('template')

@section('addedStyles')
    <link rel="stylesheet" href="{{url('css/checkout.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title','Checkout')
@section('main')
    <div class="min-w-[1150px] bg-gray-100 h-full">
        @include('components.navbar')
    
        <div class="p-4 mt-2 max-w-[1250px] mx-auto text-3xl font-extrabold">Checkout</div>

        <div class="flex max-w-[1250px] mx-auto pt-4">

          <div class="w-8/12">
            <div class="flex items-stretch border-b border-b-gray-300 w-[calc(100%-100px)] pb-4 pl-4 mb-6">
              
              <div class="text-gray-900 font-bold text-xl mr-12">
                Shipping Address
              </div>

              <div class="px-4 font-normal">
                <div>{{ $user->first_name }} {{ $user->last_name }}</div>
                <div>{{ $address->addr1 }}</div>
                <div>{{ $address->addr2 }}</div>
                <div>{{ $address->city }}</div>
                <div>{{ $address->postcode }}</div>
                <div>{{ $address->country }}</div>
              </div>

            </div>
          </div>
          

          <div class="w-4/12 border border-gray-400 rounded-md py-4 px-2">
            <form autocomplete="off" id="payment-form">
              <input type="hidden" name="client_secret" id="client_secret" value="{{ $intent != null ? $intent->client_secret : null }}">
              @csrf
              <div id="card-element"></div>

              <div class="flex justify-between text-xl text-red-700 font-extrabold border-y border-y-gray-300 my-3 p-2">
                <div>Order total:</div>
                <div>$<span id="totalInCart"></span></div>
              </div>


              <button id="submit" class="bg-yellow-400 hover:bg-yellow-500 rounded-md text-sm font-medium p-2">
                <div id="is-proccessing" class="hidden">Processing...</div>
                <div id="button-text">Place your order in USD</div>
              </button>

              <p id="card-error" class="text-red-700 text-center font-normal"></p>

            </form>
          </div>

        </div>

        <div class="w-[1200px] mx-auto text-xl font-medium pb-2 underline">Items</div>

        <div id="items_container" class="mb-16">

          <div class="w-[1200px] mx-auto">
            <div class="flex items-center py-1">

              <img width="60" src="" class="rounded-md">

              <div class="ml-4">

                <div class="text-lg font-medium"></div>

                <div class="font-medium text-red-700"></div>

              </div>

            </div>
          </div>

        </div>
        
    
        @include('components.recommended')
    
        @include('components.footer')
    </div>
@endsection

@section('addedScripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{url('js/checkout.js')}}"></script>
    <script src="{{url('js/footer.js')}}"></script>
    <script src="{{url('js/navbar.js')}}"></script>
@endsection