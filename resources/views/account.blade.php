@extends('template')

@section('title','Dashboard')
@section('main')
    @include('components.navbar')
    
    <div class="my-20 text-4xl">
        account
    </div>

    @include('components.footer')
@endsection
@section('addedScripts')
    <script src="{{url('js/footer.js')}}"></script>
    <script src="{{url('js/navbar.js')}}"></script>
@endsection