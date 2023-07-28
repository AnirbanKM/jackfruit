@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        @guest
            <div class="row justify-content-center align-items-center">
                @include('frontend.components.gustLogin')
            </div>
        @endguest

        @auth
            @include('frontend.components.task')
        @endauth
    </div>
@endsection
