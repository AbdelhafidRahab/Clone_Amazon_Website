@extends('template')

@section('title','Home')
@section('main')
    <div class="min-w-[1150px] bg-gray-100 h-full">
        @include('components.navbar')
    
        {{-- carousel --}}
        <div class="relative w-full mx-auto overflow-hidden">
            <div class="flex transition-transform duration-500 ease-in-out" id="carousel">
                <div class="flex-shrink-0 w-full">
                    <img src="./images/carousel/slide5.jpg" alt="Slide 5" class="w-full h-auto object-cover">
                </div>
                <div class="flex-shrink-0 w-full">
                    <img src="./images/carousel/slide2.jpg" alt="Slide 2" class="w-full h-auto object-cover">
                </div>
                <div class="flex-shrink-0 w-full">
                    <img src="./images/carousel/slide3.jpg" alt="Slide 3" class="w-full h-auto object-cover">
                </div>
                <div class="flex-shrink-0 w-full">
                    <img src="./images/carousel/slide4.jpg" alt="Slide 4" class="w-full h-auto object-cover">
                </div>
            </div>
    
            <button id="prevButton" class="absolute top-[116px] -translate-y-1/2 left-0 px-[20px] py-[92px] text-gray-600 border-[2px] border-transparent hover:border-gray-100 rounded-md text-4xl">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button id="nextButton" class="absolute top-[116px] -translate-y-1/2 right-0 px-[20px] py-[92px] text-gray-600 border-[2px] border-transparent hover:border-gray-100 rounded-md text-4xl">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>      
    
        {{-- categories --}}
        <div class="relative -mt-[332px] z-10">
    
            {{-- <div class="flex m-4 z-10 relative">
                <div class="bg-white mx-2 p-2 text-md w-full text-center">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, nulla.
                </div>
            </div> --}}
    
            <div class="grid grid-cols-3 m-4 z-10 relative">
                
                @foreach ($categories as $category)
                    <div class="p-1.5 flex">
                        <div class="bg-white p-5">
                            <div class="text-xl font-bold flex mb-3">{{ $category->name }}</div>
                            <a href="{{ url('/c') }}/{{ str_replace(' ', '_', $category->name) }}" class="group">
                                <div class="flex">
                                    <img src="{{ asset('/images/categories') }}/{{ $category->id }}.png" alt="Computers" class="object-fill">
                                </div>
                                <div class="pt-5 pb-1 -mb-2 text-[#007185] text-sm cursor-pointer group-hover:text-red-400">
                                    Shop now
                                </div>
                            </a>                    
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    
        @include('components.recommended', ['random_products' => $random_products])
    
        @include('components.footer')
    </div>
@endsection

@section('addedScripts')
    <script src="{{url('js/home.js')}}"></script>
    <script src="{{url('js/footer.js')}}"></script>
    <script src="{{url('js/navbar.js')}}"></script>
@endsection