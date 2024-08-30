@extends('template')

@section('title','Checkout Success')
@section('main')
    <div class="min-w-[1150px] bg-gray-100 h-full">
        @include('components.navbar')
        


        <div class="mt-10 mb-6 max-w-xl mx-auto text-3xl font-bold">Checkout Success</div>

        <div class="max-w-xl mx-auto">
          <div class="flex flex-col p-5 rounded-lg shadow bg-white mb-7">

            <div class="flex flex-col items-center text-center">

              <div class="inline-block px-3 py-2 bg-green-100 rounded-full">
                <i class="fa-solid fa-check text-[#7CFC00]"></i>
              </div>

              <h2 class="mt-2 font-normal text-2xl text-gray-800">
                Success
              </h2>

              <p class="mt-2 font-medium text-lg text-gray-600 leading-relaxed">
                Your order is on it's way!!!
              </p>

            </div>
          
            <a href="{{ url('/') }}" class="flex items-center my-4">
              <button class="flex-1 px-4 py-2 ml-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-medium rounded-md">Home</button>
            </a>

          </div>
        </div>

        @include('components.recommended')
    
        @include('components.footer')
    </div>
@endsection

@section('addedScripts')
    <script src="{{url('js/checkout_success.js')}}"></script>
    <script src="{{url('js/footer.js')}}"></script>
    <script src="{{url('js/navbar.js')}}"></script>
@endsection