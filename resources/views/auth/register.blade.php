@extends('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_back')
    <div class="row">
        <div class="HomePage1 container min-vh-100 d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-11">

                    <div class="login-card text-center">
                        <img src="{{ Vite::asset('resources/images/LogoCLR.png') }}" alt="Logo" width="60">
                        <h4 class="fw-bold">Create a new account</h4>
                        <p class="text-muted" style="font-size: 14px;">Your amazing camping will begin here</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-container mx-auto">

                                <div class="form-floating text-start mb-3">
                                    <input type="text" class="form-control" id="name" placeholder="User Name" required>
                                    <label for="name">User Name</label>
                                </div>

                                <div class="form-floating text-start mb-3">
                                    <input type="tel" class="form-control" id="phone" placeholder="Phone Number" required>
                                    <label for="phone">Phone Number</label>
                                </div>

                                <div class="form-floating text-start mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="email" required>
                                    <label for="email">Email Address</label>
                                </div>

                                <div class="form-floating text-start mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        required>
                                    <label for="password">Password</label>
                                </div>

                                <div class="form-floating text-start mb-2">
                                    <input type="password" class="form-control" id="confirmPassword"
                                        placeholder="Confirm Password" required>
                                    <label for="confirmPassword">Confirm Password</label>
                                </div>

                                <button type="submit" class="btn btn-success btn-green w-100 my-3 mt-4">
                                    Create Account
                                </button>
                            </div>

                            <div class="text-center mt-1">
                                <p class="small">Already have an account?
                                    <a href="{{ route('login') }}" class="text-primary">Log in</a>
                                </p>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection