@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_back')

    <div class="row">
        <section id="FindOut" class="FindOut container d-flex align-items-center justify-content-center">
            <div class="row d-flex text-light align-items-center justify-content-center mt-5">
                <div class="col-md-5 col-11 mt-2">
                    <div style="width: 90%;">
                        <h3 class="border-bottom border-light border-3">Backgrounf of the establishment
                        </h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis, provident
                            amet facere temporibus sapiente est reprehenderit distinctio cupiditate fugiat sit explicabo,
                            magni atque voluptate maxime exercitationem architecto repellat dolore corrupti ex minus numquam
                            repellendus veritatis suscipit. Temporibus omnis eligendi alias ipsa, sit ratione atque ullam
                            magni sequi maiores quam. Quas!</p>
                        
                        <h3 class="border-bottom border-light border-3" style="width:65%">Activities Can You Do</h3>
                        <p>We offer a variety of enjoyable and engaging activities designed to help you relax, learn, and explore. Whether you prefer adventure, creativity, or calm moments.</p>

                        <h3 class="border-bottom border-light border-3" style="width: 65%">Our Mission & Values</h3>
                        <p>Our mission is to create meaningful experiences through a safe, welcoming environment, with quality service and activities rooted in trust, responsibility, and community.</p>
                    </div>
                </div>

                <div class="col-md-5 col-11 mt-2">
                    <img src="{{ Vite::asset('resources/images/GalleryT.png') }}" alt="Angklung River Camp" class="mb-5 rounded-5" style="width: 30rem; height: 20rem;box-shadow: 30px 35px 25px 2px rgba(0, 0, 0, 0.4);">
        
                    <h3 class=" border-bottom border-light border-3" style="width: 45%">Why choose us?</h3>
                    <p>1.Beautiful Riverside Location <br>
                        2. Safe & Family-Friendly Environment <br>
                        3. Complete Camping Facilities <br>
                        4. Flexible Packages for Everyone</p>
                </div>
            </div>
        </section>
    </div>
@endsection