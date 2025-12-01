@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_main')
    <div class="row">
        {{-- Home Section --}}
        <section id="home" class="container HomePage1 d-flex align-items-center justify-content-center text-white" style="background-color:  tomato;">
            <div class="row">
                <div class="col-md-8 ms-3">
                    <div class="ms-2">
                        <h1 class="fw-bold" style="font-size: 5rem;">Angklung River Camp</h1>
                        <p class="fs-2">Angklung River Camp is a serene riverside camping site in Klungkung, Bali,
                            perfect for nature lovers seeking a peaceful escape.</p>

                        {{-- Button Booking --}}
                        <a href="{{ route('package') }}"
                            class="btn btn-success d-flex align-items-center gap-2 px-4 py-2 mb-3"
                            style="background-color: #B5C7B2; color: #114A06; border-radius: 64px; height: 60px; width: 250px; font-size: 20px;">
                            <span class="fw-bold mx-auto">BOOKING NOW</span>
                            <img src="{{ Vite::asset('resources/images/BookingLogo.png') }}" alt="Booking Icon" width="30"
                                height="30">
                        </a>

                        {{-- Sosial Media --}}
                        <div class="d-flex flex-column flex-md-row gap-3 mt-3">
                            {{-- Instagram --}}
                            <a href="https://www.instagram.com/angklung_river_camp/"
                                class="text-decoration-none link-light fs-5 d-flex align-items-center" target="blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-instagram me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                </svg>
                                <span>Angklung_River_Camp</span>
                            </a>

                            {{-- Tiktok --}}
                            <a href="https://www.tiktok.com/@angklung.river.camp"
                                class="text-decoration-none link-light fs-5 d-flex align-items-center" target="blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-tiktok me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                                </svg>
                                <span>Angklung.River.Camp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- About Section --}}
        <section id="about" class="text-white container HomePage2 d-flex justify-content-center align-items-center">
            <div class="row justify-content-center align-items-center mx-auto">
                <h3 class="fw-bold text-start top-0" style="font-size: 3rem;"> ABOUT US </h3>

                {{-- Card + Shadow --}}
                <div class="col-md-6 my-5 justify-content-center d-flex">
                    <div class="d-flex justify-content-center position-relative"
                        style="max-width: 500px; margin-top: 30px;">
                        <div class="shadow-box position-absolute rounded-4"
                            style="background-color: rgba(0, 0, 0, 0.9); width: 95%; height: 95%; top: -25px; left: -25px; border-radius: 20px; z-index: 1; box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.5);">
                        </div>

                        <img src="{{ Vite::asset('resources/images/CP1.png') }}" alt="Foto"
                            class="rounded-4 shadow-lg position-relative"
                            style="width: 100%; height: auto; border-radius: 20px; z-index: 2; box-shadow: 0px 15px 35px rgba(0, 0, 0, 0.4);">
                    </div>
                </div>

                {{-- About --}}
                <div class="col-md-6">
                    <h1 class="fw-bold mb-3">WHO ARE WE?</h1>
                    <p class="mb-3 fs-4" style="width: 90%;">
                        Located in edging clear river in Klungkung regency, Angklung River Camp offers a tranquil
                        camping
                        experience perfectly at one with nature. Perfect for families, groups, and organizations.
                    </p>


                    <!-- Find Out More Button -->
                    <a href="{{ '#' }}" class="btn d-flex align-items-center justify-content-center gap-2"
                        style="background-color: #1F2922; color: #FFFFFF; border-radius: 64px; height: 60px; width: 250px; font-size: 20px;">
                        <span class="fw-bold">FIND OUT MORE</span>
                        <img src="{{ Vite::asset('resources/images/Search.png') }}" alt="Search" width="28" height="28">
                    </a>
                </div>
            </div>
        </section>

        {{-- Gallery Section --}}
        <section id="gallery"
            class="container text-center flex-column align-items-center justify-content-center HomePage3 py-5 text-white">

            <div id="galleryCarousel" class="carousel slide mt-5" data-bs-ride="carousel"
                data-bs-interval="4000">
                <h1 class="fw-bold mb-5" style="font-size: 3rem;">OUR GALLERY</h1>
                <div class="carousel-inner" width="500" height="500">

                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center">
                            <div class="card bg-transparent border-0 shadow-lg rounded-4" style="max-width:900px;">
                                <img src="{{ Vite::asset('resources/images/GalleryT.png') }}" class="img-fluid rounded-4"
                                    style="width:100%; height:500px; object-fit:cover;" alt="Gallery 1">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="card bg-transparent border-0 shadow-lg rounded-4" style="max-width:900px;">
                                <img src="{{ Vite::asset('resources/images/GalleryKa.png') }}" class="img-fluid rounded-4"
                                    style="width:100%; height:500px; object-fit:cover;" alt="Gallery 2">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="card bg-transparent border-0 shadow-lg rounded-4" style="max-width:900px;">
                                <img src="{{ Vite::asset('resources/images/GalleryKi.png') }}" class="img-fluid rounded-4"
                                    style="width:100%; height:500px; object-fit:cover;" alt="Gallery 3">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="card bg-transparent border-0 shadow-lg rounded-4" style="max-width:900px;">
                                <img src="{{ Vite::asset('resources/images/PN1.png') }}" class="img-fluid rounded-4"
                                    style="width:100%; height:500px; object-fit:cover;" alt="Gallery 3">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="card bg-transparent border-0 shadow-lg rounded-4" style="max-width:900px;">
                                <img src="{{ Vite::asset('resources/images/PN5.png') }}" class="img-fluid rounded-4"
                                    style="width:100%; height:500px; object-fit:cover;" alt="Gallery 3">
                            </div>
                        </div>
                    </div>

                </div>
                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-light rounded-circle p-3 bg-dark"
                            aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-light rounded-circle p-3 bg-dark"
                            aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
            </div>
        </section>

        {{-- Reviews Section --}}
        <section id="reviews"
            class="HomePage4 text-white d-flex align-items-center justify-content-center flex-column container">
            <h1 class="fw-bold text-center mb-5 mt-0">Reviews of Our Visitors</h1>
            <div class="row align-items-center gap-3 d-flex d-md-flex flex-md-row flex-column">
                <div class="col-md-6 justify-content-center" style="width: 400px; height: auto;">
                    <a href="" class="text-decoration-none text-white align-items-center">
                        <h1 class="fw-bold text-center" style="font-size: 100px;">4,4</h1>
                        <h1 class="fw-bold text-center" style="font-size: 60px;">★★★★★</h1>
                        <h5 class="text-center">Based on 70 Review</h5>
                    </a>
                </div>
                <div class="col-md-6 align-items-center justify-content-center"
                    style="width: 400px; height: auto; background: rgba(8, 6, 6, 0.3); backdrop-filter: blur(10px); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); padding: 20px; border-radius: 20px;">
                    <a href="" class="text-decoration-none text-white align-items-center">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ Vite::asset('resources/images/Logo.png') }}" alt="Foto" width="50" height="50">
                            <h1>Andika JP</h1>
                        </div>
                        <h4>4,4 ★★★★★</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero autem deleniti explicabo
                            repellendus facilis placeat accusantium, nesciunt deserunt delectus, doloremque cum. Dolore
                            odit
                            dolor repellendus, aperiam a tempore natus?</p>
                    </a>
                </div>
                <div class="col-md-6 align-items-center justify-content-center"
                    style="width: 400px; height: auto; background: rgba(8, 6, 6, 0.3); backdrop-filter: blur(10px); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); padding: 20px; border-radius: 20px;">
                    <a href="" class="text-decoration-none text-white align-items-center">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ Vite::asset('resources/images/Logo.png') }}" alt="Foto" width="50" height="50">
                            <h1>Andika JP</h1>
                        </div>
                        <h4>4,4 ★★★★★</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo vero autem deleniti explicabo
                            repellendus facilis placeat accusantium, nesciunt deserunt delectus, doloremque cum. Dolore
                            odit
                            dolor repellendus, aperiam a tempore natus?</p>
                    </a>
                </div>
            </div>
        </section>

        <section id="moreinfo" class="HomePage5 align-items-center justify-content-center">
            @include('layouts.footer')
        </section>
    </div>
@endsection