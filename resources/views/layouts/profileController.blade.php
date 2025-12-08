<div class="col-md-3 col-10 bg-white rounded-5 mt-3" style="height: auto; width: auto;">
    <h1 class="text-center mt-3">{{ session('user_name') }}</h1>
    <h6 class="text-center">{{ session('user_email') }}</h6>

    {{-- Profile Settings --}}
    <div class="d-flex flex-column text-start p-3">
        <a href="{{ route('changeprofile') }}" class="text-decoration-none text-black fs-4">
            <img src="{{ Vite::asset('resources/images/change.png') }}" alt="change" style="width: 40px; height: 40px;"
                class="me-3">
            Change Profile
        </a>

        <a href="{{ route('changepassword') }}" class="text-decoration-none text-black fs-4 mt-4">
            <img src="{{ Vite::asset('resources/images/padlock.png') }}" alt="change" style="width: 40px; height: 40px;"
                class="me-3">
            Change Password
        </a>

        <a href="{{ route('history') }}" class="text-decoration-none text-black fs-4 mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                class="bi bi-clock-history me-3" viewBox="0 0 16 16">
                <path
                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                <path
                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
            </svg>
            History
        </a>
        <form action="/logout" method="POST" class="my-3">
            @csrf
            <a href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#logoutModal"
                class="text-decoration-none text-black fs-4 mt-4 text-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-box-arrow-in-right me-3" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                    <path fill-rule="evenodd"
                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
                Log Out
            </a>
        </form>
    </div>
</div>