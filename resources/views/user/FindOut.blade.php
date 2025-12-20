@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_back')

    <div class="row">
        <section id="FindOut" class="FindOut container d-flex align-items-center justify-content-center">
            <div class="row d-flex text-light align-items-center justify-content-center mt-5">

                <div class="col-md-5 col-10 mt-2">
                    <div style="width: 90%;">
                        <h4 class="text-white" style="width: 80%; border-bottom: 2px solid rgba(255, 255, 255, 0.7);">
                            Activities Can You Do</h4>
                        <p class="w-75">We offer a variety of enjoyable and engaging activities designed to help you relax,
                            learn, and
                            explore. Whether you prefer adventure, creativity, or calm moments.</p>

                        <h4 class="text-white" style="width: 80%; border-bottom: 2px solid rgba(255, 255, 255, 0.7);">Our
                            Mission & Values</h4>
                        <p class="w-75">Our mission is to create meaningful experiences through a safe, welcoming
                            environment, with
                            quality service and activities rooted in trust, responsibility, and community.</p>

                        <h4 class="text-white" style="width: 80%; border-bottom: 2px solid rgba(255, 255, 255, 0.7);">Rules
                            & Regulations</h4>
                        <p class="w-75">
                            1. Please do not litter in the camping area, especially in the river. <br>
                            2. Children under 12 years old must be supervised by a parent at all times. <br>
                            3. Always be aware of river conditions, especially during extreme or rainy weather. <br>
                            4. Sound systems or speakers are not allowed, except for approved group events.
                        </p>
                    </div>
                </div>

                <div class="col-md-5 col-10 mt-2">
                    <img src="{{ Vite::asset('resources/images/GalleryT.png') }}" alt="Angklung River Camp"
                        class="mb-5 rounded-5 FindOut-img" />

                    <h4>Why choose us?</h4>
                    <p>1. Beautiful Riverside Location <br>
                        2. Safe & Family-Friendly Environment <br>
                        3. Complete Camping Facilities <br>
                        4. Flexible Packages for Everyone
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection