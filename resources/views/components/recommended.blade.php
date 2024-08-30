<div class="bg-white text-[23px] pt-4 px-6 font-bold">Recommended based on yout shopping trends</div>
        <div class="w-full bg-white overflow-x-scroll pl-48">
            <div class="max-w-[1500px] mx-auto">
                <div class="flex justify-center items-stretch">
    
                    @foreach ($random_products as $product)
                        <a href="{{ url('/p') }}/{{ str_replace('/', '@',str_replace(' ', '_', $product->title)) }}" class="p-4 text-center mx-auto">
                            <div class="w-[158px] h-[150px] overflow-hidden">
                                <img src="{{$product->images}}" alt="">
                            </div>
                            <div class="w-[160px] text-[12px] py-2 text-teal-600 font-extrabold hover:text-red-600 cursor-pointer">
                                {{ substr($product->title, 0, 40) }}...
                            </div>
                            <div class="flex justify-start">
                                <div class="text-xs font-extrabold text-red-600 w-full text-left">${{$product->price}}</div>
                                <img width="50" src="{{ asset('/images/logo/PRIME_LOGO.png') }}" alt="">
                            </div>
                        </a>
                    @endforeach
            
                </div>
            
            </div>
        </div>