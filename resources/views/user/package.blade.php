@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_back')

    <div class="row">
        <section id="package" class="Package d-flex flex-column align-items-center text-light justify-content-center py-5 min-vh-100">
            <h1 class="fs-1 fw-bold mb-4 mt-4">Our Packages</h1>

            <div class="d-flex flex-column align-items-center gap-4 my-auto">
                <div class="card rounded-top-4 p-4 d-flex flex-row align-items-center"
                    style="background-color: #fff; width: 95%; height: 400px;">
                    <img src="{{ Vite::asset('resources/images/PN1.png') }}" alt="Picnic" class="rounded-4 me-5"
                        style="width: 100%; height: 325px; object-fit: cover;">
                    <div>
                        <h2 class="text-center fw-bold text-dark">Picnic</h2>
                        <p class="mb-4 fs-3 text-break">
                            Relax and enjoy nature with outdoor cooking or barbecue activities.
                            Perfect for those who want a calm day out without staying overnight.
                        </p>
                        <a href="{{ route('picnic') }}">
                            <button class="btn btn-lg my-3 text-light" style="background-color: #114A06;">Learn
                                More</button>
                        </a>
                    </div>
                </div>

                <div class="card p-4 d-flex flex-row align-items-center"
                    style="background-color: #fff; width: 95%; height: 400px;">
                    <img src="{{ Vite::asset('resources/images/CP1.png') }}" alt="Camping" class="rounded-4 me-5"
                        style="width: 100%; height: 325px; object-fit: cover;">
                    <div>
                        <h2 class="text-center fw-bold text-dark">Camping</h2>
                        <p class="mb-4 fs-3 text-break">
                            Experience camping in the great outdoors with comfortable tents.
                            Ideal for spending a night under the stars with friends or family.
                        </p>
                        <a href="camping">
                            <button class="btn btn-lg my-3 text-light" style="background-color: #114A06;">Learn
                                More</button>
                        </a>
                    </div>
                </div>

                <div class="card p-4 d-flex flex-row align-items-center"
                    style="background-color: #fff; width: 95%; height: 400px;">
                    <img src="{{ Vite::asset('resources/images/CV1.png') }}" alt="Campervan" class="rounded-4 me-5"
                        style="width: 100%; height: 325px; object-fit: cover;">
                    <div>
                        <h2 class="text-center fw-bold text-dark">Campervan</h2>
                        <p class="mb-4 fs-3 text-break">
                            A flexible adventure with home-like comfort. Explore nature with a
                            fully equipped camper van and create a unique camping experience.
                        </p>
                        <a href="camperVan">
                            <button class="btn btn-lg my-3 text-light" style="background-color: #114A06;">Learn
                                More</button>
                        </a>
                    </div>
                </div>

                <div class="card rounded-bottom-4 p-4 d-flex flex-row align-items-center"
                    style="background-color: #fff; width: 95%; height: 400px;">
                    <img src="{{ Vite::asset('resources/images/GE1.png') }}" alt="groupEvent" class="rounded-4 me-5"
                        style="width: 100%; height: 325px; object-fit: cover;">
                    <div>
                        <h2 class="text-center fw-bold text-dark">Group Event</h2>
                        <p class="mb-4 fs-3 text-break">
                            A special package for group activities such as gatherings, outings, or community events. Enjoy
                            togetherness in a refreshing natural atmosphere.
                        </p>
                        <a href="groupEvent">
                            <button class="btn btn-lg my-3 text-light" style="background-color: #114A06;">Learn
                                More</button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection