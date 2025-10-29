<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mesbah - One Place For Everything')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <!-- Header will be handled by the hero section in home page -->

    <main>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer (injected) -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <div class="footer-logo">
                    <svg width="244" height="47" viewBox="0 0 244 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="244" height="47" fill="url(#pattern0_210_1109)" />
                    </svg>
                </div>
                <p>One Place For Everything - Discover the best products at competitive prices</p>
                <div class="copyright">
                    &copy; {{Carbon\Carbon::now()->year}} Mesbah. All rights reserved.
                </div>
            </div>
            <div class="footer-right">
                <h3>Get Started</h3>
                <button class="footer-cta" onclick="window.location.href='{{ route('user-request.create') }}'">
                    Request a Product
                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.2787 0.196289C13.6885 2.24547 15.7377 6.63891 20.6557 7.81924C18.1967 8.80285 13.2787 11.6553 13.2787 15.1963" stroke="currentColor" stroke-width="2"/>
                        <path d="M0 8.06494L20.6557 8.06494" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </button>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('scripts/common.js') }}"></script>
</body>
</html>
