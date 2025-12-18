@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_back')
    <div class="row">
        <section id="package" class="Package ">
            <div class="my-5 d-flex flex-column align-items-center justify-content-center text-light container gap-3">
                <h1 class="fw-bold" style="font-size: 3rem;">Our Packages</h1>

                <div class="row rounded-4" style="background-color: #fff; width: 90%;">
                    <div class="col-md-6 justify-content-center d-flex">
                        <img src="{{ Vite::asset('resources/images/PN1.jpeg') }}" alt="Picnic"
                            class="rounded-4 package-img img-fluid m-3">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <h2 class="text-center fw-bold text-dark">Picnic</h2>
                        <p class="fs-3 text-break text-dark">
                            Relax and enjoy nature with outdoor cooking or barbecue activities.
                            Perfect for those who want a calm day out without staying overnight.
                        </p>
                        <a href="{{ route('picnic') }}">
                            <button class="btn btn-lg text-light mb-3" style="background-color: #114A06;">Learn
                                More</button>
                        </a>
                    </div>
                </div>

                <div class="row rounded-4" style="background-color: #fff; width: 90%;">
                    <div class="col-md-6 justify-content-center d-flex">
                        <img src="{{ Vite::asset('resources/images/CP1.jpeg') }}" alt="Camping"
                            class="rounded-4 package-img img-fluid m-3">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <h2 class="text-center fw-bold text-dark">Camping</h2>
                        <p class="fs-3 text-break text-dark">
                            Experience camping in the great outdoors with comfortable tents.
                            Ideal for spending a night under the stars with friends or family.
                        </p>
                        <a href="{{ route('camping') }}">
                            <button class="btn btn-lg text-light mb-3" style="background-color: #114A06;">Learn
                                More</button>
                        </a>
                    </div>
                </div>

                <div class="row rounded-4" style="background-color: #fff; width: 90%;">
                    <div class="col-md-6 justify-content-center d-flex">
                        <img src="{{ Vite::asset('resources/images/CV1.jpg') }}" alt="Campervan"
                            class="rounded-4 package-img img-fluid m-3">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <h2 class="text-center fw-bold text-dark">Campervan</h2>
                        <p class="fs-3 text-break text-dark">
                            A flexible adventure with home-like comfort. Explore nature with a
                            fully equipped camper van and create a unique camping experience.
                        </p>
                        <a href="{{ route('camperVan') }}">
                            <button class="btn btn-lg text-light mb-3" style="background-color: #114A06;">Learn
                                More</button>
                        </a>
                    </div>
                </div>

                <div class="row rounded-4" style="background-color: #fff; width: 90%;">
                    <div class="col-md-6 justify-content-center d-flex">
                        <img src="{{ Vite::asset('resources/images/GE1.jpeg') }}" alt="Group Event"
                            class="rounded-4 package-img img-fluid m-3">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <h2 class="text-center fw-bold text-dark">Group Event</h2>
                        <p class="fs-3 text-break text-dark">
                            A special package for group activities such as gatherings, outings, or community events. Enjoy
                            togetherness in a refreshing natural atmosphere.
                        </p>
                        <a href="{{ route('groupEvent') }}">
                            <button class="btn btn-lg text-light mb-3" style="background-color: #114A06;">Learn
                                More</button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection