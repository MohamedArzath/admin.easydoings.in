<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    @yield('meta-data')
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <!-- Vendors styles-->
    <link rel="stylesheet" href="/vendors/simplebar/css/simplebar.css">
    <!-- Main styles for this application-->
    <link href="/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="/css/examples.css" rel="stylesheet">
    <script src="/js/config.js"></script>
    <script src="/js/color-modes.js"></script>
    <link href="/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    @yield('custom-style')
</head>
<body>
    @include('layouts.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100">

        @include('layouts.header')

        @yield('content')

        <footer class="footer px-4">
            <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io/product/bootstrap-dashboard-template/">Bootstrap Admin Template</a> © 2025 creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI PRO UI Components</a></div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
    <script src="/vendors/simplebar/js/simplebar.min.js"></script>
    <script src="/vendors/i18next/js/i18next.min.js"></script>
    <script src="/vendors/i18next-http-backend/js/i18nextHttpBackend.js"></script>
    <script src="/vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js"></script>
    <script src="/js/i18next.js"></script>
    <script>
        const header = document.querySelector('header.header');

        document.addEventListener('scroll', () => {
            if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
        });
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/vendors/chart.js/js/chart.umd.js"></script>
    <script src="/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="/vendors/@coreui/utils/js/index.js"></script>
    <script src="/js/main.js"></script>

    @yield('custom-script')
</body>
</html>