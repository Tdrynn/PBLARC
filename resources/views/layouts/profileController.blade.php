<div class="col-md-3 col-10 bg-white rounded-5 mt-3" style="height: auto; width: auto;">

    <div class="my-2">
        <a href="{{ Route('profile') }}"
            class="text-decoration-none {{ Route::currentRouteName() == 'profile' ? 'text-success' : 'text-black'}}">
            <div class="d-flex flex-column justify-content-center align-items-center text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor"
                    class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <h1>{{ session('user_name') }}</h1>
                <h6>{{ session('user_email') }}</h6>
            </div>
        </a>

        {{-- Profile Settings --}}
        <div class="d-flex flex-column text-start p-1 gap-4 mt-1">
            <a href="{{ route('changeprofile') }}" class="text-decoration-none fs-4 
          {{ Route::currentRouteName() == 'changeprofile' ? 'text-success' : 'text-black' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-person-fill-gear me-3 {{ Route::currentRouteName() == 'changeprofile' ? 'text-success' : 'text-black'}}"
                    viewBox="0 0 16 16">
                    <path
                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                </svg>
                Change Profile
            </a>

            <a href="{{ route('changepassword') }}" class="text-decoration-none fs-4
          {{ Route::currentRouteName() == 'changepassword' ? 'text-success' : 'text-black' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-lock me-3 {{ Route::currentRouteName() == 'changepassword' ? 'text-success' : 'text-black' }}"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4M4.5 7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7zM8 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
                </svg>
                Change Password
            </a>

            <a href="{{ route('history') }}"
                class="text-decoration-none fs-4 {{ Route::currentRouteName() == 'history' ? 'text-success' : 'text-black' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-clock-history me-3 {{ Route::currentRouteName() == 'history' ? 'text-success' : 'text-black' }}"
                    viewBox="0 0 16 16">
                    <path
                        d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                    <path
                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                </svg>
                History
            </a>

            <a href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#logoutModal"
                class="text-decoration-none text-black fs-4 text-start {{ Route::currentRouteName() == 'logout' ? 'text-success' : 'text-black' }}">
                <form action="/logout" method="POST">
                    @csrf
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-box-arrow-in-right me-3 {{ Route::currentRouteName() == 'logout' ? 'text-success' : 'text-black' }}"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                        <path fill-rule="evenodd"
                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                    Log Out
                </form>
            </a>
        </div>
    </div>
    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 fw-bold" id="logoutModalLabel">Are you sure?</h5>
                </div>
                <div class="modal-body">
                    <p class="text-muted fs-6">You will be logged out from your account.</p>
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
</div>