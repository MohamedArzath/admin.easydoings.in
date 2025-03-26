<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="./">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Login to Admin Easydoings.in</title>

        <link rel="manifest" href="assets/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <!-- Vendors styles-->
        <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
        <!-- Main styles for this application-->
        <link href="css/style.css" rel="stylesheet">
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        <link href="css/examples.css" rel="stylesheet">
        <script src="js/config.js"></script>
        <script src="js/color-modes.js"></script>
    </head>
    <body>
        <div class="min-vh-100 d-flex flex-row align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card-group d-block d-md-flex row">
                            <div class="card col-md-7 p-4 mb-0">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div >
                                            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

                                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                                @foreach ($errors->all() as $error)
                                                    <li class="text-danger font-weight-bold">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @session('status')
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ $value }}
                                        </div>
                                    @endsession
                                    <h1>Login</h1>
                                    <p class="text-body-secondary">Sign In to your account</p>
                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                                </svg>
                                            </span>
                                            <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                        </div>
                                        <div class="input-group mb-4">
                                            <span class="input-group-text">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                                </svg>
                                            </span>
                                            <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn btn-primary px-4" type="submit   ">Login</button>
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CoreUI and necessary plugins-->
        <script src="vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
        <script src="vendors/simplebar/js/simplebar.min.js"></script>
        <script src="vendors/i18next/js/i18next.min.js"></script>
        <script src="vendors/i18next-http-backend/js/i18nextHttpBackend.js"></script>
        <script src="vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js"></script>
        <script src="js/i18next.js"></script>
        <script>
            const header = document.querySelector('header.header');
            
            document.addEventListener('scroll', () => {
              if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
              }
            });
        </script>
        <script></script>
    </body>
</html>