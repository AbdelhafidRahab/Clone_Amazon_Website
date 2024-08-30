@extends('template')

@section('title','Address')
  <div class="min-w-[1150px] bg-gray-100 h-full">
    @include('components.navbar', ['categories' => $categories])

      <div class="max-w-[500px] mx-auto text-2xl font-bold my-8">
        <div>Add a new address</div>

        <form action="{{ url('/address/add/done') }}" method="POST">

          @if (session()->has('fail'))
            <div class="bg-red-100 border-x-2 border-red-500 text-red-700 p-4 rounded-lg">
                <p class="text-base font-semibold">Fail</p>
                <p class="text-base font-normal">{{session('fail')}}</p>
            </div>
          @endif

          @csrf

          <div class="font-bold text-[16px]">Country</div>
          <select name="country" class="px-2 py-1 font-medium text-base w-full border border-gray-300 rounded-lg shadow-md bg-gray-200 hover:bg-gray-300 cursor-pointer focus:border-orange-400 focus:ring-orange-400 focus:outline-none" required>

            <option selected value="Algeria">Algeria</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="Germany">Germany</option>
            <option value="France">France</option>

          </select>

          <div class="mt-4">
            <label for="firstname" class="font-medium text-gray-500 text-[16px]">First name</label>
            <input id="firstname" type="text" class="my-1 block w-full border focus:border-orange-400 focus:outline-none px-2 py-1 font-normal text-base" required value="{{ $user->first_name }}">
          </div>

          <div class="mt-3">
            <label for="lastname" class="font-medium text-gray-500 text-[16px]">Last name</label>
            <input id="lastname" type="text" class="my-1 block w-full border focus:border-orange-400 focus:outline-none px-2 py-1 font-normal text-base" required value="{{ $user->last_name }}">
          </div>

          <div class="mt-3">

            <label for="adress1" class="font-medium text-gray-500 text-[16px]">Address</label>

            <input id="adress1" type="text" name="addr1" class="my-1 block w-full border focus:border-orange-400 focus:outline-none px-2 py-1 font-normal text-base" placeholder="Address line 1" required>

            <input id="adress2" type="text" name="addr2" class="my-1 block w-full border focus:border-orange-400 focus:outline-none px-2 py-1 font-normal text-base" placeholder="Address line 2" required>

          </div>



          <div class="mt-3">
            <div class="flex gap-2">

              <div class="w-full">
                <label for="city" class="font-medium text-gray-500 text-[16px]">City</label>
                <input id="city" type="text" name="city" class="my-1 block w-full border focus:border-orange-400 focus:outline-none px-2 py-1 font-normal text-base" placeholder="City" required>
              </div>

              <div class="w-full">
                <label for="postcode" class="font-medium text-gray-500 text-[16px]">Postcode</label>
                <input id="postcode" type="text" name="postcode" class="my-1 block w-full border focus:border-orange-400 focus:outline-none px-2 py-1 font-normal text-base" placeholder="Postcode" required>
              </div>

            </div>
          </div>

          <div class="mt-6">
            <button class="bg-[#FFD814] px-3 font-medium text-[14px] rounded-lg shadow-sm cursor-pointer">
              Add address
            </button>
          </div>




        </form>
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