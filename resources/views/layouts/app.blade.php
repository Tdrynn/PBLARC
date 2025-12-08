<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angklung River Camp</title>
    <style>
        #pageLoader {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
            opacity: 1;
            transition: opacity .5s ease;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 6px solid #ffffff33;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin .8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/Logo.png') }}">
</head>

<body>
    <div id="pageLoader" style="
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.85);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 99999;
    ">
        <div class="loader"></div>

    </div>

    <div class="container-fluid">
        <main>
            @yield('content')
        </main>
    </div>

    <script>
        window.addEventListener("load", function () {
            const loader = document.getElementById("pageLoader");

            loader.style.opacity = "0";

            setTimeout(() => {
                loader.style.display = "none";
            }, 500);
        });
    </script>
</body>

</html>