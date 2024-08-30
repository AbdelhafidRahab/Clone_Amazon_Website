@extends('template')

@section('title','Manage Profile')
@section('main')
    <div class="min-w-[1150px] bg-gray-100 h-full">
        @include('components.navbar')
        
        <div class="max-w-[700px] mx-auto text-2xl font-normal p-6 rounded-md my-8 bg-white">
            <div>Profile Information</div>
            <div class="text-sm text-gray-500 mt-1">Update your account profile information and email address</div>
    
            <form action="{{ url('/account/manage/update_info') }}" method="POST">
                @csrf
    
                <div class="mt-4">
                    <label for="first_name" class="text-sm font-bold text-gray-700">First name</label>
                    <input id="first_name" name="first_name" type="text" class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" required value="{{ $user->first_name }}">
                </div>
    
                <div class="mt-3">
                    <label for="last_name" class="text-sm font-bold text-gray-700">Last name</label>
                    <input id="last_name" name="last_name" type="text" class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" required value="{{ $user->last_name }}">
                </div>

                <div class="mt-3">
                    <label for="email" class="text-sm font-bold text-gray-700">Email</label>
                    <input id="email" name="email" type="text" class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" required value="{{ $user->email }}">
                </div>

                <div class="mt-6">
                    <button class="bg-[#FFD814] px-3 font-medium text-[14px] rounded-lg shadow-sm cursor-pointer w-full">
                    Save
                    </button>
                </div>

            </form>
        </div>

        <div class="max-w-[700px] mx-auto text-2xl font-normal p-6 rounded-md my-8 bg-white">
            <div>Update Password</div>
            <div class="text-sm text-gray-500 mt-1">Ensure your account is using a long, random password to stay secure</div>
    
            <form action="{{ url('/account/manage/update_password') }}" method="POST">
                @if (session()->has('fail'))
                    <div class="bg-red-100 border-x-2 border-red-500 text-red-700 p-4 rounded-lg">
                        <p class="text-base font-semibold">Fail</p>
                        <p class="text-base font-normal">{{session('fail')}}</p>
                    </div>
                @endif
    
                @csrf
    
                <div>
                    <label for="current_password" class="text-sm font-bold text-gray-700">
                        Current Password
                    </label>
                    <input type="password" id="current_password" name="current_password"
                        class="mt-1 block w-full px-2 py-1 border border-gray-400 rounded-sm shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                        required placeholder="At least 8 characters" minlength="8">
                </div>

                <div>
                    <label for="new_password" class="text-sm font-bold text-gray-700">
                        New Password
                    </label>
                    <input type="password" id="new_password" name="new_password"
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

                <div class="mt-6">
                    <button class="bg-[#FFD814] px-3 font-medium text-[14px] rounded-lg shadow-sm cursor-pointer w-full">
                    Update
                    </button>
                </div>

            </form>
        </div>

        <div class="max-w-[700px] mx-auto text-2xl font-normal p-6 rounded-md my-8 bg-white">
            <div>Delete Account</div>
            <div class="text-sm text-gray-500 mt-1">Once your account is deleted, all of its ressources and data will be permanently deleted.</br>Before deleting your account, please delete any data of information that you wish retain.</div>
    
            <form action="{{ url('/account/manage/destroy') }}" method="POST">
                @csrf

                <div class="mt-6">
                    <button class="bg-red-600 px-3 font-normal text-[14px] rounded-lg shadow-sm cursor-pointer text-white">
                    DELETE ACCOUNT
                    </button>
                </div>

            </form>
        </div>

        @include('components.footer')
    </div>
@endsection
@section('addedScripts')
    <script src="{{url('js/footer.js')}}"></script>
    <script src="{{url('js/navbar.js')}}"></script>
    <script src="{{url('js/manage.js')}}"></script>
@endsection