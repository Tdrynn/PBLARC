@extends ('layouts.app')

@section('content')
    @include('layouts.navbar.navbar_profile')
    <div class="row">
        <section id="profile" class="ProfilePage container d-flex align-items-center justify-content-center flex-column">
            <div class="row gap-5 w-100 align-items-center justify-content-center my-5">

                {{-- Left Card --}}
                @include('layouts.profileController')

                {{-- Right Card --}}
                <div class="col-md-7 col-sm-12 bg-white justify-content-center gap-3 rounded-5">

                    {{-- Title --}}
                    <div class="d-flex align-items-center text-start" style="padding: 20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-lock me-3"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4M4.5 7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7zM8 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
                        </svg>
                        <h1 class="m-0">Change Password</h1>
                    </div>

                    {{-- Content --}}
                    <div class="d-flex flex-column align-items-center gap-3 text-dark text-center mb-5"
                        style="max-height: 425px; overflow-y: auto;">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <form class="h-75 text-start fw-semibold" action="{{ route('updatepass') }}" method="POST"
                            style="width: 95%;">
                            @csrf
                            @method('PUT')
                            <div class="mb-2">
                                <label for="password" class="form-label">Old Password</label>
                                <input type="password" id="password" class="form-control border-success" required
                                    name="oldpass">
                            </div>
                            <div class="mb-2">
                                <label for="newpassword" class="form-label">New Password</label>
                                <input type="password" id="newpassword" class="form-control border-success" required
                                    name="password">
                            </div>
                            <div class="mb-2">
                                <label for="confirmpassword" class="form-label">Confirm Password</label>
                                <input type="password" id="confirmpassword" class="form-control border-success" required
                                    name="confirmpass">
                            </div>

                            <div class="d-flex justify-content-end mt-4 gap-5 justify-content-end">
                                <button type="reset" class="btn btn-danger btn-lg  button-profile">Discard
                                    Changes</button>
                                <button type="submit" class="btn btn-success btn-lg button-profile">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header border-0">
                        <h5 class="modal-title w-100 fw-bold" id="logoutModalLabel">Are you sure?</h5>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted">You will be logged out from your account.</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center border-0">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">No</button>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger px-4">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection