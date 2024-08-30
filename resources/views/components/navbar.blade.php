{{-- top nav --}}
<div class="flex items-center bg-gray-900 h-[60px] py-2 px-2 z-50 min-w-[1150] w-full">

  <div class="flex">
    <a href="{{ url('/') }}" class="text-white h-[50px] p-2 pt-3 border-[1px] border-gray-900 rounded-sm hover:border-gray-100 cursor-pointer"> 
      <img src="{{ asset('images/logo/AMAZON_LOGO.png') }}" alt="amazon_logo" width="95">
    </a>
  </div>

  <div class="text-white h-[50px] p-2 px-4 border-[1px] border-gray-900 rounded-sm hover:border-gray-100 cursor-pointer"> 
    <a href="{{ url('/address') }}">
      <div class="flex items-center justify-center">
        <i class="fa-solid fa-location-dot pt-2 -ml-1 mr-1" style="color: #f5f5f5"></i>
  
        <div>
          @if ($address != null)
            <div class="text-[13px] text-gray-300">
              <div>Delivery to</div>
            </div>
            <div class="text-[15px] text-white -mt-1.5 font-bold">
              <div>{{ $address->country }}, {{ $address->city }}</div>
            </div>
          @else
            <div class="text-[13px] text-gray-300">
              <div>Select</div>
            </div>
            <div class="text-[15px] text-white -mt-1.5 font-bold">
              <div>Your Country</div>
            </div>
          @endif
        </div>
      </div>
    </a>
  </div>

  <div class="flex grow items-center h-[45px] px-1">
    <div class="flex items-center justify-center bg-gray-100 border-r border-r-gray-300 font-extrabold text-[11px] text-gray-600 w-[60px] h-[40px] rounded-l-md cursor-pointer">
      <div class="pt-[3px]">
        All
      </div>
      <i class="fa-solid fa-sort-down -mr-2 -mt-1 ml-2" style="color: #5E5E5E"></i>
    </div>
    <input type="text" placeholder="Search Amazon" class="block w-full h-[40px] border-none border-transparent focus:border-transparent focus:ring-0 focus:outline-none px-2">
      <div class="flex items-center justify-center cursor-pointer bg-orange-300 w-[50px] h-[40px] rounded-r-md">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
  </div>

  <div class="flex">

    <div class="h-[50px] p-2 px-4 border-[1px] border-gray-900 rounded-sm hover:border-gray-100 cursor-pointer">
      <div class="flex items-center justify-center mt-2.5 px-1">
        <img src="{{ asset('images/flags/US.png') }}" width="22" class="mb-3 mr-1" alt="">
        <div class="text-[15px] text-white -mt-2 -mr-0.5 font-extrabold">EN</div>
        <i class="fa-solid fa-sort-down text-[11px] -mr-4 -mt-1.5 pr-1 ml-2" style="color: #c2c2c2"></i>
      </div>
    </div>

    <div class="hover-btn h-[50px] p-2 px-4 border-[1px] border-gray-900 rounded-sm hover:border-gray-100 cursor-pointer relative">

      <div class="flex items-center justify-center">
        <div>
          <div class="text-[12px] text-white">
            Hello,
            @if ($user != null)
              <span>{{ $user->first_name }}</span>
            @else
              <span>sign in</span>
            @endif
          </div>
          <div class="flex items-center">
            <div class="text-[15px] text-white -mt-1.5 font-extrabold">Account & List</div>
            <i class="fa-solid fa-sort-down text-[11px] -mr-2 -mt-3 pr-1 ml-2" style="color: #c2c2c2"></i>
          </div>
        </div>
      </div>

      <div class="cursor-default dropdown-menu hidden bg-white absolute z-50 top-[48px] -ml-[260px] w-[480px] rounded-sm px-6 py-4 shadow-lg transition-opacity duration-200 ease-in-out opacity-0">       
        <div>

          @if ($user != null)
            <div class="flex items-center justify-between py-2.5 px-2 rounded-lg bg-[#E7F4F5]">
              <div class="text-sm p-2 text-gray-900">Who's shopping Select a profile.</div>
              <a href="{{ url('/account/profile') }}" class="cursor-pointer flex items-center text-sm font-semibold text-teal-600 hover:text-red-600 hover:underline">
                Manage Profile <i class="fa-solid fa-chevron-right ml-2 text-[#808080]"></i>
              </a>
            </div>
          @else
            <div class="flex flex-col items-center justify-center py-2.5 px-2 rounded-lg">
              <a href="{{ url('/login') }}"
                  class="bg-[#FFD814] hover:underline text-black text-sm py-1.5 px-[90px] rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                  Sign in
              </a>
              <div class="mt-2 text-xs text-gray-600">
                New customer? <a href="{{ url('/register') }}" class="text-blue-600 hover:text-red-600 hover:underline">Start here.</a>
              </div>
            </div>
          @endif

          <div class="flex pt-4">
            <div class="w-1/2 border-r">
              <div class="pb-3">
                <div class="font-bold pt-1 pb-2 text-gray-900">Your Lists</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Create a list</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Find a list or Registry</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Your saved Books</div>
              </div>
            </div>
  
            <div class="w-1/2 ml-5">
              <div class="pb-3">
                <div class="font-bold pt-1 pb-2 text-gray-900">Your Account</div>
                @if ($user != null)
                  <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Switch Accounts</div>
                  <a href="{{ url('/logout') }}" class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Sign out</a>
                  <div class="border-b mt-1 mb-2"></div>
                @endif
                
                <a href="{{ url('/account') }}" class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Account</a>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Orders</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Recommendations</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Browsing History</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Watchlist</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Video Purchases & Rentals</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Kindle Unlimited</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Content & Devices</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Subscribe & Save Items</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Memberships & Subscriptions</div>
                <div class="cursor-pointer text-xs hover:text-red-600 hover:underline pb-1 text-gray-900">Music Library</div>
  
              </div>
            </div>
  
          </div>
  
        </div>
      </div>

    </div>

    <div class="h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-gray-100 cursor-pointer">
      <div class="flex items-center justify-center">
        <div>
          <div class="text-[12px] text-white">
            Returns
          </div>
          <div class="flex items-center">
            <div class="text-[15px] text-white -mt-1.5 font-extrabold">& Orders</div>
          </div>
        </div>
      </div>
    </div>

    <a href="{{ url('/cart') }}" class="relative h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-gray-100 cursor-pointer">
      <span class="absolute text-center right-[14px] w-[20px] top-0 rounded-full text-[15px]">
        <div id="cartItemsCount" class="text-orange-400 font-extrabold bg-gray-900 rounded-b-md">0</div>
      </span>
      <div class="flex items-center justify-center">
        <i class="fa-solid fa-cart-shopping fa-2xl mt-4" style="color: #fcfcfc"></i>
      </div>
    </a>

  </div>

</div>

{{-- horizantal menu --}}
<div class="flex items-center justify-between bg-[#232f3e] h-[40px] z-40 min-w-[1150] w-full px-2">
  <div class="flex px-1">

    <div class="flex h-[40px] border-[1px] border-[#232f3e] rounded-sm hover:border-gray-100 cursor-pointer">
      <div class="flex items-center justify-between px-2" id="menu-btn">
        <i class="fa-solid fa-bars fa-lg text-white mr-1"></i>
        <div class="text-white text-[14px] font-bold">All</div>
      </div>
    </div>

    <div class="flex h-[40px] border-[1px] border-[#232f3e] rounded-sm hover:border-gray-100 cursor-pointer">
      <div class="flex items-center justify-between px-2">
        <div class="text-white text-[14px]">Today's Deals</div>
      </div>
    </div>

    <div class="flex h-[40px] border-[1px] border-[#232f3e] rounded-sm hover:border-gray-100 cursor-pointer">
      <div class="flex items-center justify-between px-2">
        <div class="text-white text-[14px]">Buy Again</div>
      </div>
    </div>

    <div class="flex h-[40px] border-[1px] border-[#232f3e] rounded-sm hover:border-gray-100 cursor-pointer">
      <div class="flex items-center justify-between px-2">
        <div class="text-white text-[14px]">Customer Service</div>
      </div>
    </div>

    <div class="flex h-[40px] border-[1px] border-[#232f3e] rounded-sm hover:border-gray-100 cursor-pointer">
      <div class="flex items-center justify-between px-2">
        <div class="text-white text-[14px]">Registry</div>
      </div>
    </div>

    <div class="flex h-[40px] border-[1px] border-[#232f3e] rounded-sm hover:border-gray-100 cursor-pointer">
      <div class="flex items-center justify-between px-2">
        <div class="text-white text-[14px]">Gift Cards</div>
      </div>
    </div>

    <div class="flex h-[40px] border-[1px] border-[#232f3e] rounded-sm hover:border-gray-100 cursor-pointer">
      <div class="flex items-center justify-between px-2">
        <div class="text-white text-[14px]">Sell</div>
      </div>
    </div>

  </div>

</div>

{{-- side menu --}}
<div class="top-0 z-50 fixed w-full h-full bg-black bg-opacity-70 hidden opacity-0 transition-opacity duration-300" id="side-menu-wrapper">
  <div class="w-[370px] h-full bg-white shadow-lg transform -translate-x-full transition-transform duration-300 overflow-y-scroll pb-11" id="side-menu">
    <div class="bg-[#232f3e] font-bold text-[20px] flex items-center p-3 text-white pl-7">
      <i class="fa-solid fa-circle-user fa-lg mr-4"></i>
      <span>Hello, {{ $user != null ? $user->first_name : 'Sign in'}}</span>
    </div>

    <div class="font-bold text-[19px] pt-4 pb-1 pl-7 pr-3 text-gray-900">
      Digital Content & Devices
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        Amazon Music
        <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-gray-900"></i>
      </div>
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        Kindle E-readers & Books
        <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-gray-900"></i>
      </div>
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        Amazon Appstore
        <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-gray-900"></i>
      </div>
    </div>
    <div class="border-b my-2 border-gray-300"></div>
    
    <div class="font-bold text-[19px] pt-4 pb-1 pl-7 pr-3 text-gray-900">
      Shop by Department
    </div>
    @foreach ($categories as $category)
      <div class="hover:bg-gray-200 px-7 group">
        <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
          {{ $category->name }}
          <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-gray-900"></i>
        </div>
      </div>
    @endforeach
    <div class="border-b my-2 border-gray-300"></div>

    <div class="font-bold text-[19px] pt-4 pb-1 pl-7 pr-3 text-gray-900">
      Programs & Features
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        Gift Cards
        <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-gray-900"></i>
      </div>
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        Shop By Interest
        <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-gray-900"></i>
      </div>
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        Amazon Live
        <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-gray-900"></i>
      </div>
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        International Shopping
        <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-gray-900"></i>
      </div>
    </div>
    <div class="border-b my-2 border-gray-300"></div>

    <div class="font-bold text-[19px] pt-4 pb-1 pl-7 pr-3 text-gray-900">
      Help & Settings
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <a href="{{ url('/account') }}" class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        Your Account
      </a>
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        <span><i class="fa-solid fa-globe mr-2"></i>English</span>
      </div>
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        <span><img src="{{ asset('images/flags/DZ.jpg') }}" width="22" class="mr-1 inline" alt="">Algeria</span>
      </div>
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <div class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        Customer Service
      </div>
    </div>
    <div class="hover:bg-gray-200 px-7 group">
      <a href="{{ url('/logout') }}" class="py-2.5 text-[14px] text-black flex justify-between items-center cursor-pointer">
        Sign Out
      </a>
    </div>

  </div>
  <i class="fa-solid fa-x fa-lg absolute top-4 pt-3 text-white left-[380px] cursor-pointer" id="close-btn"></i>
</div>

<div class="dropdawn-menu-overlay z-20 fixed w-full h-full bg-black bg-opacity-70 hidden opacity-0 transition-opacity duration-300"></div>