@extends('template')

@section('title','Register')

@section('main')
  <div class="min-h-screen flex flex-col items-center pt-3">
  
    <a href="/" class="flex justify-center mb-4">
      <img src="./images/logo/AMAZON_LOGO_DARK.png" alt="Amazon Logo" class="w-28">
    </a>

    <div class="w-full max-w-[350px] px-6 py-4 bg-white border border-gray-300 overflow-hidden rounded-md">
      <h1 class="text-3xl mb-4">Create account</h1>

      <form action="{{ url('/register/done') }}" method="POST" class="space-y-4">

        @if (session()->has('success'))
          <div class="bg-green-100 border-x-2 border-green-500 text-green-700 p-4 rounded-lg">
              <p class="text-base font-semibold">Success</p>
              <p>You have been successfully registered, you can now <a href="{{ url('/login') }}" class="underline font-bold">login</a></p>
          </div>
        @endif
        @if (session()->has('fail'))
          <div class="bg-red-100 border-x-2 border-red-500 text-red-700 p-4 rounded-lg">
              <p class="text-base font-semibold">Fail</p>
              <p>{{session('fail')}}</p>
          </div>
        @endif
        @csrf

              

        

          <!-- Name input -->
          <div>
              <label for="first_name" class="block text-sm font-bold text-gray-700">First name</label>
              <input type="text" id="first_name" name="first_name"
                  class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                  required placeholder="First name" autofocus maxlength="255">
          </div>

          <!-- Name input -->
          <div>
            <label for="last_name" class="block text-sm font-bold text-gray-700">Last name</label>
            <input type="text" id="last_name" name="last_name"
                class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                required placeholder="Last name" maxlength="255">
        </div>

          <!-- Email input -->
          <div>
              <label for="email" class="block text-sm font-bold text-gray-700">Mobile number or email</label>
              <input type="email" id="email" name="email"
                  class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                  required maxlength="255">
          </div>
          <div class="text-red-700 text-sm" style="margin-top: 2px !important;">@error('email') {{$message}}@enderror</div>

          <!-- Password input -->
          <div>
              <label for="password" class="text-sm font-bold text-gray-700">
                Password
              </label>
              <input type="password" id="password" name="password"
                  class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                  required placeholder="At least 8 characters" minlength="8">
          </div>

          <div>
            <label for="re-enter_password" class="text-sm font-bold text-gray-700">
              Re-enter password
            </label>
            <input type="password" id="re-enter_password" name="re-enter_password"
                class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                required minlength="8">
          </div>
          <div id="re-enter_password_error" class="text-red-500 text-sm" style="margin-top: 2px !important;"></div>

          <!-- Continue button -->
          <button id="submitBtn" type="submit"
              class="w-full bg-[#FFD814] hover:bg-yellow-400 text-black text-sm py-1.5 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
              Register
          </button>
      </form>

      <!-- Legal text -->
      <div class="mt-4 text-[13px] text-gray-600">
        By creating an account, you agree to Amazon's <a href="#" class="text-blue-600 hover:text-red-600 underline">Conditions of Use</a>
          and <a href="#" class="text-blue-600 hover:text-red-600 underline">Privacy Notice</a>.
      </div>

      <div class="flex items-center mt-6 mb-4">
        <div class="w-full border-t border-gray-200"></div>
      </div>

      <div class="mt-4">
          <div class="text-xs font-bold tracking-wider">Buying for work?</div>
          <a href="#" class="text-[13px] cursor-pointer text-blue-600 hover:text-red-600 hover:underline">Create a free business account</a>
      </div>

      <div class="h-1 my-4" style="background: linear-gradient(to bottom, rgba(0, 0, 0, .14), rgba(0, 0, 0, .03) 3px, transparent);"></div>

      <div class="mt-4 text-[13px] text-gray-600">
          Already have an account? <a href="{{ url('/login') }}" class="text-blue-600 hover:text-red-600 hover:underline">Sign in<i class="fa-solid fa-caret-right fa-2xs ml-1 mt-1 text-blue-600"></i></a>
      </div>

    </div>


    <div class="pb-10 mt-10 w-full">
      <div class="h-[44px]" style="background: linear-gradient(to bottom, rgba(0, 0, 0, .14), rgba(0, 0, 0, .03) 3px, transparent);"></div>
        <!-- Links -->
        <div class="text-center text-xs mb-3">
            <ul class="flex justify-center space-x-4">
                <li>
                    <a class="text-blue-600 hover:underline" href="#" target="_blank">Conditions of Use</a>
                </li>
                <li>
                    <a class="text-blue-600 hover:underline" href="#" target="_blank">Privacy Notice</a>
                </li>
                <li>
                    <a class="text-blue-600 hover:underline" href="#" target="_blank">Help</a>
                </li>
            </ul>
        </div>
    
        <!-- Copyright -->
        <div class="text-center text-xs text-gray-500 mt-2">
            © 1996-2024, Amazon.com, Inc. or its affiliates
        </div>
    </div>
  














  </div>
@endsection

@section('addedScripts')
  <script src="{{url('js/register.js')}}"></script>
@endsection