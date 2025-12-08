@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_unLogin')

    <div class="row">
        <section id="reviewList"
            class="HomePage4 text-white d-flex align-items-center justify-content-center flex-column container gap-3">
            <div class="row mt-5">
                <div class="col-md-6 justify-content-center text-white align-items-center w-100 my-3" style="height: auto;">
                    <h1 class="fw-bold text-center">Our Rating</h1>
                    <h1 class="fw-bold text-center" style="font-size: 100px;">
                        {{ number_format($averageRating, 1) }}
                    </h1>

                    <h1 class="fw-bold text-center" style="font-size: 60px;">
                        {{ str_repeat('★', round($averageRating)) }}
                    </h1>
                </div>
            </div>

            <div class="row align-items-center gap-3 d-flex d-md-flex flex-md-row flex-column">
                @foreach ($reviews as $review)
                    <div class="col-md-6 align-items-center justify-content-center"
                        style="width: 400px; height: auto; background: rgba(8, 6, 6, 0.3); backdrop-filter: blur(10px); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); padding: 20px; border-radius: 20px;">

                        <div class="d-flex align-items-center gap-3 text-white align-items-center">
                            <img src="{{ Vite::asset('resources/images/Logo.png') }}" alt="Foto" width="50"
                                height="50">
                            <h1>{{ $review->name }}</h1>
                        </div>

                        <h4>{{ number_format($review->rating, 1) }} ★★★★★</h4>

                        <p>{{ $review->review }}</p>
                    </div>
                @endforeach
            </div>


            <a href="{{ route('reviewList.all') }}" class="my-4 text-white text-decoration-none">
                <h5>Show All Reviews</h5>
            </a>


        </section>
    </div>
@endsection
