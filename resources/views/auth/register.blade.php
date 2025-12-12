@extends('layouts.auth')

@section('content')
    @include('layouts.navbar.navbar_unLogin')
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center justify-content-center HomePage1 object-fit-cover">
                    <div class="login-card text-center my-5">
                        <img src="{{ Vite::asset('resources/images/LogoCLR.png') }}" alt="Logo" width="60">

                        <h4 class="fs-4 fw-bold">Create New Account</h4>
                        <p class="fs-6" style="color: #555;">Your amazing camping will begin here</p>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="/register">
                            @csrf
                            <div class="m-2">
                                <div class="form-floating text-start mb-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name"
                                        required>
                                    <label for="name">User Name</label>
                                </div>

                                <div class="form-floating text-start mb-3">
                                    <input type="tel" class="form-control" id="phone" placeholder="Phone Number"
                                        name="phone" required>
                                    <label for="phone">Phone Number</label>
                                </div>
                                <div class="form-floating text-start mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                        required>
                                    <label for="email">Email Address</label>
                                </div>
                                <div class="form-floating mb-3 position-relative">
                                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                                    <label for="password">Password</label>
                                    <button type="button" id="togglePassword"
                                        class="btn btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2">
                                        <i id="iconPassword" class="bi bi-eye-slash"></i>
                                    </button>
                                </div>

                                <div class="form-floating mb-3 position-relative">
                                    <input type="password" id="confirmPassword" class="form-control"
                                        placeholder="Confirm Password" name="password_confirmation" required>
                                    <label for="confirmPassword">Confirm Password</label>
                                    <button type="button" id="toggleConfirm"
                                        class="btn btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2">
                                        <i id="iconConfirm" class="bi bi-eye-slash"></i>
                                    </button>
                                </div>

                                <button type="submit" class="btn btn-success btn-green w-100 my-3 mt-4">
                                    Create Account
                                </button>
                            </div>

                            <div class="text-center mt-1">
                                <p class="small">Already have an account?
                                    <a href="/login" class="text-primary">Log in</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection