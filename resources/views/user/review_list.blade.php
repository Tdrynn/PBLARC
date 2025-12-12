@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_unLogin')

    <div class="row">
        <section id="reviewList"
            class="HomePage4 text-white d-flex align-items-center justify-content-center flex-column container gap-3">

            {{-- Average Review --}}
            <div class="row mt-5">
                <div class="col-md-6 justify-content-center text-white align-items-center w-100 my-3" style="height: auto;">
                    <h1 class="fw-bold text-center">Our Rating</h1>
                    <h1 class="fw-bold text-center" style="font-size: 100px;">
                        {{ number_format($averageRating, 1) }}
                    </h1>
                    @php
                        $avgFilled = round($averageRating);
                        $avgEmpty = 5 - $avgFilled;
                    @endphp
                    <h1 class="fw-bold text-center" style="font-size: 60px;">
                        {{ str_repeat('★', $avgFilled) }}{{ str_repeat('☆', $avgEmpty) }}
                    </h1>
                </div>
            </div>

            {{-- Review Content --}}
            <div class="row align-items-center gap-3 d-flex d-md-flex flex-md-row flex-column justify-content-center">
                @foreach ($reviews as $review)

                    {{-- Empty Star Counter --}}
                    @php
                        $filled = round($review->rating);
                        $empty = 5 - $filled;
                    @endphp

                    <div class="col-md-6 align-items-center justify-content-center"
                        style="width: 400px; height: auto; background: rgba(8, 6, 6, 0.3); backdrop-filter: blur(10px); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); padding: 20px; border-radius: 20px;">

                        {{-- Reviewer Name & Profile --}}
                        <div class="d-flex align-items-center gap-3 text-white align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            <h1>{{ $review->name }}</h1>
                        </div>

                        {{-- Star & Date of Review --}}
                        <div>
                            <h3>
                                {{ number_format($review->rating, 1) }}
                                {{ str_repeat('★', $filled) }}{{ str_repeat('☆', $empty) }}
                            </h3>

                            <small class="text-white-50 text-end">
                                {{ $review->created_at->format('d M Y') }}
                            </small>
                        </div>

                        {{-- Review Description --}}
                        @php
                            $limit = 120;
                            $isLong = strlen($review->review) > $limit;
                            $preview = $isLong ? substr($review->review, 0, $limit) . '...' : $review->review;
                        @endphp

                        <p class="review-text">
                            {{ Str::limit($review->review, 100) }}

                            @if (strlen($review->review) > 100)
                                <button class="btn btn-link text-white p-0"
                                    data-bs-toggle="modal"
                                    data-bs-target="#reviewModal{{ $review->id }}">
                                    Read More
                                </button>
                            @endif
                        </p>
                    </div>
                @endforeach

                @foreach ($reviews as $review)
                    <div class="modal fade" id="reviewModal{{ $review->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content modal-card text-light">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $review->name }}'s Review</h5>
                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    @php
                                        $f = round($review->rating);
                                    @endphp

                                    <small class="text-white-50 text-end">
                                        {{ $review->created_at->format('d M Y') }}
                                    </small>

                                    <h3>
                                        {{ number_format($review->rating, 1) }}
                                        {{ str_repeat('★', $f) }}{{ str_repeat('☆', 5 - $f) }}
                                    </h3>

                                    <p>{{ $review->review }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            {{-- Show All Review Button --}}
            <a href="{{ route('reviewList.all') }}" class="my-4 text-white text-decoration-none">
                <h5>Show All Reviews</h5>
            </a>


        </section>
    </div>
@endsection
