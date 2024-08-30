@extends('template')

@section('title','Address')
  <div class="min-w-[1150px] bg-gray-100 h-full">
    @include('components.navbar', ['categories' => $categories])

      <div class="max-w-[1000px] mx-auto text-3xl mb-4 mt-12">
        Your adresses
      </div>

      <div class="max-w-[1000px] mx-auto flex gap-2 mb-12 flex-wrap">

        <div class="border border-detted border-gray-400 rounded-md w-80 h-[270px]">

          @if (!session()->has('success'))
            <a href="{{ url('/address/add') }}">
              <div class="grid h-full place-items-center cursor-pointer">
                <div class="text-center">

                  <div class="flex justify-center">
                    <i class="fa-solid fa-plus text-4xl"></i>
                  </div>

                  <div class="font-medium text-2xl">
                    Add Address
                  </div>

                </div>
              </div>
            </a>
          @else
            <div class="grid h-full place-items-center bg-green-100 text-green-700">
              <div class="text-center">
                <div class="font-medium text-2xl">Address is added</div>
              </div>
            </div>
          @endif

        </div>

        @foreach ($addresses as $address)
          <div class="relative border border-gray-400 rounded-md w-80 shadow-md h-[270px]">

            <div class="flex items-center justify-start p-3 text-xs text-gray-600 font-bold border-b border-gray-400">
              Default: <img class="h-3 mt-1 ml-2" src="{{ asset('/images/logo/AMAZON_LOGO_DARK.png') }}" alt="">
            </div>

            <div class="text-sm font-bold px-4 pt-4">
              {{ $user->first_name }} {{ $user->last_name }}
            </div>

            <div class="text-sm px-4">
              <div>{{ $address->addr1 }}</div>
              <div>{{ $address->addr2 }}</div>
              <div>{{ $address->city }}</div>
              <div>{{ $address->postcode }}</div>
              <div>{{ $address->country }}</div>
            </div>

            <div class="px-4 absolute bottom-0">
              <form action="{{ url('/address/remove') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $address->id }}">
                <button class="text-teal-700 text-sm font-extrabold hover:underline hover:text-red-700 cursor-pointer">
                  Remove
                </button>
              </form>
            </div>

          </div>
        @endforeach


      </div>


    @include('components.recommended', ['random_products' => $random_products])

    @include('components.footer')
  </div> 
@section('main')

@endsection

@section('addedScripts')
  <script src="{{url('js/footer.js')}}"></script>
  <script src="{{url('js/navbar.js')}}"></script>
@endsection