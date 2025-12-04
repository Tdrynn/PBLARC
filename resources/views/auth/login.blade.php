@extends('layouts.auth')

@section('content')
    @include('layouts.navbar.navbar_back')
    <div class="row">
        <div class="vh-100 text-white d-flex align-items-center justify-content-center HomePage1 object-fit-cover">
            <div class="login-card text-center text-black">
                <img src="{{ Vite::asset('resources/images/LogoCLR.png') }}" alt="Logo" width="60">
                <h4 style="font-weight: 700;">Log in to your account</h4>
                <p style="font-size: 14px; color: #555;">Your amazing camping will begin here</p>
                <form method="POST" action="/login">
                    @csrf
                    <div class="m-2">
                        <div class="form-floating mb-3 text-start">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com" required>
                            <label for="floatingInput">Email address</label>
                        </div>

                        <div class="form-floating mb-3 text-start border border-success-subtle">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>

                        <button type="submit" class="btn btn-success btn-green w-100 my-2">Log In</button>
                    </div>
                </form>

                <div class="text-center mt-1">
                    <p>Don't have an account? <a href="/register" class="text-primary">Create account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection