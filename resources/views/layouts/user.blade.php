<!DOCTYPE html>
<html lang="{{ __('menu.lang') }}" dir="{{ __('menu.dir') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('menu.title') }} </title>
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-Dnh8PmVN.css') }}">
    <script src="{{ asset('build/assets/app-BnamtF72.js') }}"></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @livewireStyles --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <meta name="description" content="{{ __('menu.objective') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">

    <style>
        .custom-confirm-button {
            background-color: #C64D58 !important;
            color: white !important;
            border-radius: 5px;
            padding: 10px 20px;
        }

        .custom-cancel-button {
            background-color: #dc3545 !important;
            color: white !important;
            border-radius: 5px;
            padding: 10px 20px;
        }
    </style>
    @yield('css')
</head>

<body class="bg-gray-100">
    <!-- الهيدر -->

    @include('includes.header')
    <!-- السلايدر -->
    @yield('content')

    <!-- الفوتر -->
    @include('includes.footer')

    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>

    @yield('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let menu = document.getElementById('menu');
            let menuToggle = document.getElementById('menu-toggle');
            let icon = document.getElementById('menu-icon');

            // تأكد أن العناصر موجودة قبل تنفيذ الأحداث
            if (menu && menuToggle && icon) {
                // تحديث حالة القائمة عند تغيير حجم الشاشة
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 840) {
                        menu.classList.add('hidden');
                    }
                });

                // التحكم في إظهار/إخفاء القائمة عند الضغط
                menuToggle.addEventListener('click', function() {
                    menu.classList.toggle('hidden');
                    menu.classList.toggle('opacity-100');
                    menu.classList.toggle('translate-y-0');

                    // تغيير أيقونة القائمة
                    icon.textContent = menu.classList.contains('hidden') ? '☰' : '✖';
                });
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif
            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        });
    </script>
    {{-- @livewireScripts --}}
</body>

</html>
