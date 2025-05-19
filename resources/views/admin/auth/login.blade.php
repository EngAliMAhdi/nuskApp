<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        نسك للعمرة
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="bg-gray-200">

    <!-- End Navbar -->

    <main class="mt-0 main-content">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('{{ asset('media/bg1.png') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="mx-auto col-lg-4 col-md-8 col-12">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="p-0 mx-3 card-header position-relative mt-n4 z-index-2">
                                <div class="py-3 bg-gradient-info shadow-primary border-radius-lg pe-1">
                                    <h4 class="mt-2 mb-0 text-center text-white font-weight-bolder"> نسك للعمرة</h4>
                                    <div class="mt-3 row">
                                        <div class="text-center col-2 ms-auto">

                                        </div>
                                        <div class="px-1 text-center col-2">

                                        </div>
                                        <div class="text-center col-2 me-auto">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                <form role="form" method="post" action="{{ route('admin.login') }}"
                                    class="text-start">
                                    @csrf
                                    <div class="my-3 input-group input-group-outline">
                                        <label class="form-label">البريد الإلكتروني</label>
                                        <input type="text" name="username"
                                            class="border rounded form-control form-control-sm">
                                    </div>
                                    <div class="mb-3 input-group input-group-outline">
                                        <label class="form-label">كلمة المرور</label>
                                        <input type="password" name="password"
                                            class="border rounded form-control form-control-sm">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="my-4 mb-2 btn bg-gradient-info w-100">تسجيل
                                            دخول</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.0') }}"></script>
</body>

</html>
