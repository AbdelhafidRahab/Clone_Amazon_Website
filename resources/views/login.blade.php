@extends('template')

@section('title','Login')

@section('main')
  <div class="min-h-screen flex flex-col items-center pt-3">

    <a href="/" class="flex justify-center mb-4">
      <img src="{{ asset('images/logo/AMAZON_LOGO_DARK.png') }}" alt="Amazon Logo" class="w-28">
    </a>

    <div class="w-full max-w-[350px] px-6 py-4 bg-white border border-gray-300 overflow-hidden rounded-md">
      <h1 class="text-3xl mb-4">Sign in</h1>

      <form action="{{ url('/login/done') }}" method="POST" class="space-y-4">
        @csrf
        @if (session()->has('fail'))
          <div class="bg-red-100 border-x-2 border-red-500 text-red-700 p-2 rounded-lg">
              <p class="text-base font-semibold">Fail</p>
              <p>{{session('fail')}}</p>
          </div>
        @endif

          <!-- Email input -->
          <div class="part-one">
              <label for="email" class="block text-sm font-bold text-gray-700">Email or mobile phone number</label>
              <input type="email" id="email" name="email"
                  class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                  required maxlength="255">
          </div>

          <div class="part-two hidden text-sm" id="email-value-in-part-two"></div>

          <!-- Password input -->
          <div class="part-two hidden">
              <label for="password" class="flex justify-between w-full text-sm font-bold text-gray-700">
                Password
                <a href="#" class="text-[13px] cursor-pointer text-blue-600 hover:text-red-600 hover:underline font-normal">Forgot password?</a>
              </label>
              <input type="password" id="password" name="password"
                  class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                  required>
          </div>

          <!-- Continue button -->
          <button id="submitBtn" type="submit"
              class="w-full bg-[#FFD814] hover:bg-yellow-400 text-black text-sm py-1.5 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
              Continue
          </button>
      </form>

      <!-- Legal text -->
      <div class="mt-4 text-[13px] text-gray-600 part-one">
          By continuing, you agree to Amazon's <a href="#" class="text-blue-600 hover:text-red-600 underline">Conditions of Use</a>
          and <a href="#" class="text-blue-600 hover:text-red-600 underline">Privacy Notice</a>.
      </div>

      <!-- Help links -->
      <div class="mt-4 flex items-center part-one">
          <i class="fa-solid fa-caret-right fa-2xs mr-2 text-gray-700"></i>
          <div class="text-[13px] cursor-pointer text-blue-600 hover:text-red-600 hover:underline">Need help?</div>
      </div>

      <div class="flex items-center mt-6 mb-4 part-one">
        <div class="w-full border-t border-gray-200"></div>
      </div>

      <div class="mt-4 part-one">
          <div class="text-xs font-bold tracking-wider">Buying for work?</div>
          <a href="#" class="text-[13px] cursor-pointer text-blue-600 hover:text-red-600 hover:underline">Shop on Amazon Business</a>
      </div>

      {{-- Keep sign in --}}
      <div class="flex part-two hidden mt-3">
        <input type="checkbox" name="keep-me-sign-in" id="keep-me-sign-in" class="mr-2 mb-[1px]">
        <label class="text-sm" for="keep-me-sign-in">Keep me signed in.</label>
      </div>

    </div>

    <div class="relative mt-5 mb-3 part-one">
        <div class="flex items-center">
            <div class="absolute top-2 -left-[120px] w-[350px] border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center text-xs">
            <span class="bg-white px-2 text-gray-500">New to Amazon?</span>
        </div>
    </div>

    <a href="register"
      class="w-full max-w-[350px] bg-white hover:bg-gray-100 text-gray-800 text-sm shadow-sm border border-gray-300 py-1 rounded-md text-center block focus:outline-none focus:ring-2 focus:ring-yellow-500 part-one">
      Create your Amazon account
    </a>


    <div class="pb-10 mt-10 w-full">
      <div class="h-[44px]" style="background: linear-gradient(to bottom, rgba(0, 0, 0, .14), rgba(0, 0, 0, .03) 3px, transparent);">
        
      </div>
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
  <script src="{{url('js/login.js')}}"></script>
@endsection