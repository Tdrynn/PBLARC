<nav class="navbar navbar-expand-lg fixed-top bg-transparent navbar-dark py-2 mt-0">
    <div class="container-fluid">
        <a class="navbar-brand" href={{ route('home') }}>
            <img src="{{ Vite::asset('resources/images/Logo.png') }}" width="50px" alt="Logo">
            Angklung River Camp
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active me-4" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}">
                    <button type="button" class="btn btn-success me-4">Back</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>