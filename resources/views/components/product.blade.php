<div class="border border-gray-300 rounded-md bg-white p-1.5">
  <a href="{{ url('/p') }}/{{ str_replace('/', '@',str_replace(' ', '_', $product->title))}}" class="w-full">
    <img src="{{$product->images}}" class="rounded-md">
    <div class="text-left">
      <div class="cursor-pointer text-[16px] text-gray-900 font-medium">
        {{$product->title}}
      </div>

      <div class="flex justify-between items-center">
        <div class="text-2xl p-1 font-medium w-full text-left">${{$product->price}}</div>
        <img width="50" src="{{ asset('/images/logo/PRIME_LOGO.png') }}" alt="">
      </div>

      <div class="flex justify-between items-center">
        <div class="text-md p-1 font-medium w-full text-left">In Stock</div>
      </div>

      <div class="flex justify-between items-center">
        <img width="80" src="{{ asset('/images/STARS.png') }}" alt="">
      </div>

    </div>

  </a>

</div>