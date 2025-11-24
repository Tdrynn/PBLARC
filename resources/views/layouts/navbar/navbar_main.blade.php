<nav class="navbar navbar-expand-lg fixed-top bg-transparent navbar-dark py-2 mt-0">
    <div class="container-fluid">
        <a class="navbar-brand" href={{ url('#home') }}>
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
                    <a class="nav-link me-4" aria-current="page" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4" href="#reviews">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4" href="#moreinfo">More Informations</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}">
                    <button type="button" class="btn btn-success me-4">Login</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Script --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-link");
    const sections = document.querySelectorAll("section[id]");

    // 🔹 Klik link = scroll halus + ubah active
    navLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href").substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop , // offset untuk navbar fixed-top
                    behavior: "smooth"
                });
            }

            navLinks.forEach(l => l.classList.remove("active"));
            this.classList.add("active");
        });
    });

    // 🔹 Scroll otomatis ubah active
    window.addEventListener("scroll", () => {
        let current = "";
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            if (scrollY >= sectionTop) {
                current = section.getAttribute("id");
            }
        });

        navLinks.forEach(link => {
            link.classList.remove("active");
            if (link.getAttribute("href") === "#" + current) {
                link.classList.add("active");
            }
        });
    });
});
</script>
