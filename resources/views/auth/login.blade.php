@extends('layouts.auth')

@section('content')
    @include('layouts.navbar.navbar_back')
    <div class="row">
        <div class="container">
            <div class="row">
                <div
                    class="col-md-8 vh-100 text-white d-flex align-items-center justify-content-center HomePage1 object-fit-cover">
                    <div class="login-card text-center text-black">
                        <img src="{{ Vite::asset('resources/images/LogoCLR.png') }}" alt="Logo" width="60">
                        <h4 class="fs-4 fw-bold">Log in to your account</h4>
                        <p class="fs-6" style="color: #555;">Your amazing camping will begin here</p>
                        <form action="">
                            <div class="m-2">
                                <div class="form-floating mb-3 text-start">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" required>
                                    <label for="floatingInput">Email address</label>
                                </div>

                                <div class="form-floating mb-3 text-start border border-success-subtle">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                        required>
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <button type="submit" class="btn btn-success btn-green w-100 my-2">Log In</button>
                            </div>
                        </form>

                        <div class="text-center mt-1">
                            <p>Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create
                                    account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection