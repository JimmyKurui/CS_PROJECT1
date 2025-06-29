<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MediCare</title>

    <link rel="icon" href="{{ asset('images/helping-hands-giving-back.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray" data-theme="dark">
    <div class="hero-welcome">
        <header class="video-background">
            <video playsinline autoplay loop muted preload="auto">
                <source src="{{ asset('videos/medicare_lp_clip_jimmy.mp4') }}" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </header>
        
        @if (Route::has('login'))
        <nav class="d-flex p-5 justify-content-end">
            @auth
            <a href="{{ route('home.user') }}" class=" mx-4">Home</a>
            @else
            <a href="{{ route('home.pharmacy') }}" class=" mx-4">Pharmacy</a>
            <a href="{{ route('login') }}" class=" mx-4">Log In</a>
            @endauth
        </nav>
        @endif

        <main class="d-flex flex-column align-items-center mb-3">
            <section class="hero container my-4">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="p-3">Find Any Medicine in Your Area — Instantly</h1>
                        <h4>
                            <small>With real-time availability of pharmaceutical products across verified pharmacies near you</small>
                        </h4>
                        <a href="{{ route('register') }}" class="btn rainbow-btn mt-5 bg-dark">Search Now</a>
                    </div>
                </div>
            </section>

            <section class="about container my-3">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        <p class="heading mb-2">It started with a simple, urgent need: “Where can I find this medicine today?”</p>
                        <p class="heading-text slide-fade-in slide-left">
                            <span>At the peak of the COVID-19 pandemic in Nairobi, families — including ours — were left in the dark about where to get life-saving medication when access was chaotic and uncertain.</span>
                            <br />
                        </p>
                        <p class="heading-text slide-fade-in slide-right">Today, it helps anyone search local pharmacies in real time — open source and built for everyone.</p>
                    </div>
                </div>
            </section>
        </main>

        <footer class="w-100">
            <div class="container text-center py-3">
                <p class="mb-0">© {{ date('Y') }}
                    <a href="https://github.com/JimmyKurui/CS_PROJECT1" class="text-decoration-none">Jimmy Chepkurui</a>
                    All rights reserved
                </p>
            </div>
        </footer>
    </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>