    <aside
        class="my-3 border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-end me-3 rotate-caret"
        id="sidenav-main">
        <div class="sidenav-header ">
            <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute start-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="m-0 navbar-brand" href="{{ route('admin.dashboard') }}" target="_blank">
                <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="me-1 font-weight-bold">نسك للعمرة</span>
            </a>
        </div>
        <hr class="mt-0 mb-2 horizontal dark">
        <div class="w-auto px-0 collapse navbar-collapse max-height-vh-100 h-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">لوحة التحكم</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link   {{ request()->is('admin/about*') ? 'active' : '' }} "
                        href="{{ route('about.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">إعداد من نحن</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ request()->is('admin/social*') ? 'active' : '' }} "
                        href="{{ route('social.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6" d=" M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0
                        10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5
                        L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">إعداد وسائل التواصل </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ request()->is('admin/contact*') ? 'active' : '' }}"
                        href="{{ route('contact.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">طلبات التواصل </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }} "
                        href="{{ route('user.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">المستخدمين </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/hotels*') ? 'active' : '' }}"
                        href="{{ route('hotels.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">الفنادق</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/partment*') ? 'active' : '' }}"
                        href="{{ route('partment.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">الشقق</span>
                    </a>
                </li>
                <li class="mt-3 nav-item">
                    <h6 class="text-xs pe-4 me-2 text-uppercase font-weight-bolder opacity-6">النقل البري</h6>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/driver*') ? 'active' : '' }} "
                        href="{{ route('drivers.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 64 64" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>drivers</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#FFFFFF" fill-rule="nonzero">
                                        <circle class="color-background opacity-6" cx="20" cy="20"
                                            r="4" />
                                        <circle class="color-background opacity-6" cx="44" cy="20"
                                            r="4" />

                                        <path class="color-background opacity-6"
                                            d="M16,30 C16,27.8 17.8,26 20,26 C22.2,26 24,27.8 24,30 L24,34 L16,34 L16,30 Z" />
                                        <path class="color-background opacity-6"
                                            d="M40,30 C40,27.8 41.8,26 44,26 C46.2,26 48,27.8 48,30 L48,34 L40,34 L40,30 Z" />

                                        <path class="color-background"
                                            d="M12,36 C12,34.9 12.9,34 14,34 L50,34 C51.1,34 52,34.9 52,36 L52,48 C52,49.1 51.1,50 50,50 L14,50 C12.9,50 12,49.1 12,48 L12,36 Z M20,44 C21.7,44 23,42.7 23,41 C23,39.3 21.7,38 20,38 C18.3,38 17,39.3 17,41 C17,42.7 18.3,44 20,44 Z M44,44 C45.7,44 47,42.7 47,41 C47,39.3 45.7,38 44,38 C42.3,38 41,39.3 41,41 C41,42.7 42.3,44 44,44 Z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <span class="nav-link-text me-1">السائقين</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/transport*') ? 'active' : '' }} "
                        href="{{ route('transport.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 64 64" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>multiple-vehicles</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#FFFFFF" fill-rule="nonzero">
                                        <path class="color-background opacity-6"
                                            d="M10,42 L14,30 C14.4,28.8 15.5,28 16.8,28 L35.2,28 C36.5,28 37.6,28.8 38,30 L42,42 L42,50 C42,51.1 41.1,52 40,52 L38,52 C36.9,52 36,51.1 36,50 L36,48 L16,48 L16,50 C16,51.1 15.1,52 14,52 L12,52 C10.9,52 10,51.1 10,50 L10,42 Z M18,46 C19.7,46 21,44.7 21,43 C21,41.3 19.7,40 18,40 C16.3,40 15,41.3 15,43 C15,44.7 16.3,46 18,46 Z M34,46 C35.7,46 37,44.7 37,43 C37,41.3 35.7,40 34,40 C32.3,40 31,41.3 31,43 C31,44.7 32.3,46 34,46 Z" />

                                        <path class="color-background"
                                            d="M28,26 L32,16 C32.4,15 33.5,14 34.8,14 L53.2,14 C54.5,14 55.6,15 56,16 L60,26 L60,34 C60,35.1 59.1,36 58,36 L56,36 C54.9,36 54,35.1 54,34 L54,32 L34,32 L34,34 C34,35.1 33.1,36 32,36 L30,36 C28.9,36 28,35.1 28,34 L28,26 Z M36,30 L37.1,26.5 L50.9,26.5 L52,30 L36,30 Z M38,34 C36.9,34 36,33.1 36,32 C36,30.9 36.9,30 38,30 C39.1,30 40,30.9 40,32 C40,33.1 39.1,34 38,34 Z M50,34 C48.9,34 48,33.1 48,32 C48,30.9 48.9,30 50,30 C51.1,30 52,30.9 52,32 C52,33.1 51.1,34 50,34 Z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <span class="nav-link-text me-1">وسائل النقل</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/vehicles*') ? 'active' : '' }} "
                        href="{{ route('vehicles.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 24 24" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>vehicle</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#FFFFFF" fill-rule="nonzero">
                                        <path class="color-background opacity-6"
                                            d="M3,11 L5,6.5 C5.2,6 5.7,5.5 6.3,5.5 L17.7,5.5 C18.3,5.5 18.8,6 19,6.5 L21,11 L21,17 C21,17.6 20.6,18 20,18 L19,18 C18.4,18 18,17.6 18,17 L18,16 L6,16 L6,17 C6,17.6 5.6,18 5,18 L4,18 C3.4,18 3,17.6 3,17 L3,11 Z M6.5,15 C7.3,15 8,14.3 8,13.5 C8,12.7 7.3,12 6.5,12 C5.7,12 5,12.7 5,13.5 C5,14.3 5.7,15 6.5,15 Z M17.5,15 C18.3,15 19,14.3 19,13.5 C19,12.7 18.3,12 17.5,12 C16.7,12 16,12.7 16,13.5 C16,14.3 16.7,15 17.5,15 Z" />
                                        <path class="color-background"
                                            d="M5.5,10 L6.6,7.5 L17.4,7.5 L18.5,10 L5.5,10 Z M7,12 C6.45,12 6,12.45 6,13 C6,13.55 6.45,14 7,14 C7.55,14 8,13.55 8,13 C8,12.45 7.55,12 7,12 Z M17,12 C16.45,12 16,12.45 16,13 C16,13.55 16.45,14 17,14 C17.55,14 18,13.55 18,13 C18,12.45 17.55,12 17,12 Z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <span class="nav-link-text me-1">المركبات </span>
                    </a>
                </li>
                <li class="mt-3 nav-item">
                    <h6 class="text-xs pe-4 me-2 text-uppercase font-weight-bolder opacity-6">النقل الجوي</h6>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/air*') ? 'active' : '' }} "
                        href="{{ route('air.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 64 64" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>drivers</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#FFFFFF" fill-rule="nonzero">
                                        <circle class="color-background opacity-6" cx="20" cy="20"
                                            r="4" />
                                        <circle class="color-background opacity-6" cx="44" cy="20"
                                            r="4" />

                                        <path class="color-background opacity-6"
                                            d="M16,30 C16,27.8 17.8,26 20,26 C22.2,26 24,27.8 24,30 L24,34 L16,34 L16,30 Z" />
                                        <path class="color-background opacity-6"
                                            d="M40,30 C40,27.8 41.8,26 44,26 C46.2,26 48,27.8 48,30 L48,34 L40,34 L40,30 Z" />

                                        <path class="color-background"
                                            d="M12,36 C12,34.9 12.9,34 14,34 L50,34 C51.1,34 52,34.9 52,36 L52,48 C52,49.1 51.1,50 50,50 L14,50 C12.9,50 12,49.1 12,48 L12,36 Z M20,44 C21.7,44 23,42.7 23,41 C23,39.3 21.7,38 20,38 C18.3,38 17,39.3 17,41 C17,42.7 18.3,44 20,44 Z M44,44 C45.7,44 47,42.7 47,41 C47,39.3 45.7,38 44,38 C42.3,38 41,39.3 41,41 C41,42.7 42.3,44 44,44 Z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <span class="nav-link-text me-1">النقل الجوي</span>
                    </a>
                </li>

                <li class="mt-3 nav-item">
                    <h6 class="text-xs pe-4 me-2 text-uppercase font-weight-bolder opacity-6">خدمات أخرى </h6>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }} "
                        href="{{ route('services.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 64 64" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>drivers</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#FFFFFF" fill-rule="nonzero">
                                        <circle class="color-background opacity-6" cx="20" cy="20"
                                            r="4" />
                                        <circle class="color-background opacity-6" cx="44" cy="20"
                                            r="4" />

                                        <path class="color-background opacity-6"
                                            d="M16,30 C16,27.8 17.8,26 20,26 C22.2,26 24,27.8 24,30 L24,34 L16,34 L16,30 Z" />
                                        <path class="color-background opacity-6"
                                            d="M40,30 C40,27.8 41.8,26 44,26 C46.2,26 48,27.8 48,30 L48,34 L40,34 L40,30 Z" />

                                        <path class="color-background"
                                            d="M12,36 C12,34.9 12.9,34 14,34 L50,34 C51.1,34 52,34.9 52,36 L52,48 C52,49.1 51.1,50 50,50 L14,50 C12.9,50 12,49.1 12,48 L12,36 Z M20,44 C21.7,44 23,42.7 23,41 C23,39.3 21.7,38 20,38 C18.3,38 17,39.3 17,41 C17,42.7 18.3,44 20,44 Z M44,44 C45.7,44 47,42.7 47,41 C47,39.3 45.7,38 44,38 C42.3,38 41,39.3 41,41 C41,42.7 42.3,44 44,44 Z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <span class="nav-link-text me-1">خدمات أضافية </span>
                    </a>
                </li>


                <li class="mt-3 nav-item">
                    <h6 class="text-xs pe-4 me-2 text-uppercase font-weight-bolder opacity-6">الباقات </h6>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/bouquet*') ? 'active' : '' }} "
                        href="{{ route('bouquet.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 64 64" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>drivers</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#FFFFFF" fill-rule="nonzero">
                                        <circle class="color-background opacity-6" cx="20" cy="20"
                                            r="4" />
                                        <circle class="color-background opacity-6" cx="44" cy="20"
                                            r="4" />

                                        <path class="color-background opacity-6"
                                            d="M16,30 C16,27.8 17.8,26 20,26 C22.2,26 24,27.8 24,30 L24,34 L16,34 L16,30 Z" />
                                        <path class="color-background opacity-6"
                                            d="M40,30 C40,27.8 41.8,26 44,26 C46.2,26 48,27.8 48,30 L48,34 L40,34 L40,30 Z" />

                                        <path class="color-background"
                                            d="M12,36 C12,34.9 12.9,34 14,34 L50,34 C51.1,34 52,34.9 52,36 L52,48 C52,49.1 51.1,50 50,50 L14,50 C12.9,50 12,49.1 12,48 L12,36 Z M20,44 C21.7,44 23,42.7 23,41 C23,39.3 21.7,38 20,38 C18.3,38 17,39.3 17,41 C17,42.7 18.3,44 20,44 Z M44,44 C45.7,44 47,42.7 47,41 C47,39.3 45.7,38 44,38 C42.3,38 41,39.3 41,41 C41,42.7 42.3,44 44,44 Z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <span class="nav-link-text me-1">انواع الباقات </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/discount*') ? 'active' : '' }} "
                        href="{{ route('discount.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 64 64" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>drivers</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#FFFFFF" fill-rule="nonzero">
                                        <circle class="color-background opacity-6" cx="20" cy="20"
                                            r="4" />
                                        <circle class="color-background opacity-6" cx="44" cy="20"
                                            r="4" />

                                        <path class="color-background opacity-6"
                                            d="M16,30 C16,27.8 17.8,26 20,26 C22.2,26 24,27.8 24,30 L24,34 L16,34 L16,30 Z" />
                                        <path class="color-background opacity-6"
                                            d="M40,30 C40,27.8 41.8,26 44,26 C46.2,26 48,27.8 48,30 L48,34 L40,34 L40,30 Z" />

                                        <path class="color-background"
                                            d="M12,36 C12,34.9 12.9,34 14,34 L50,34 C51.1,34 52,34.9 52,36 L52,48 C52,49.1 51.1,50 50,50 L14,50 C12.9,50 12,49.1 12,48 L12,36 Z M20,44 C21.7,44 23,42.7 23,41 C23,39.3 21.7,38 20,38 C18.3,38 17,39.3 17,41 C17,42.7 18.3,44 20,44 Z M44,44 C45.7,44 47,42.7 47,41 C47,39.3 45.7,38 44,38 C42.3,38 41,39.3 41,41 C41,42.7 42.3,44 44,44 Z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <span class="nav-link-text me-1">ضبط التسعير </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/packages*') ? 'active' : '' }} "
                        href="{{ route('packages.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 64 64" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>drivers</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#FFFFFF" fill-rule="nonzero">
                                        <circle class="color-background opacity-6" cx="20" cy="20"
                                            r="4" />
                                        <circle class="color-background opacity-6" cx="44" cy="20"
                                            r="4" />

                                        <path class="color-background opacity-6"
                                            d="M16,30 C16,27.8 17.8,26 20,26 C22.2,26 24,27.8 24,30 L24,34 L16,34 L16,30 Z" />
                                        <path class="color-background opacity-6"
                                            d="M40,30 C40,27.8 41.8,26 44,26 C46.2,26 48,27.8 48,30 L48,34 L40,34 L40,30 Z" />

                                        <path class="color-background"
                                            d="M12,36 C12,34.9 12.9,34 14,34 L50,34 C51.1,34 52,34.9 52,36 L52,48 C52,49.1 51.1,50 50,50 L14,50 C12.9,50 12,49.1 12,48 L12,36 Z M20,44 C21.7,44 23,42.7 23,41 C23,39.3 21.7,38 20,38 C18.3,38 17,39.3 17,41 C17,42.7 18.3,44 20,44 Z M44,44 C45.7,44 47,42.7 47,41 C47,39.3 45.7,38 44,38 C42.3,38 41,39.3 41,41 C41,42.7 42.3,44 44,44 Z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <span class="nav-link-text me-1"> أعداد الباقات </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/booking*') ? 'active' : '' }} "
                        href="{{ route('booking1.index') }}">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 64 64" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>drivers</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#FFFFFF" fill-rule="nonzero">
                                        <circle class="color-background opacity-6" cx="20" cy="20"
                                            r="4" />
                                        <circle class="color-background opacity-6" cx="44" cy="20"
                                            r="4" />

                                        <path class="color-background opacity-6"
                                            d="M16,30 C16,27.8 17.8,26 20,26 C22.2,26 24,27.8 24,30 L24,34 L16,34 L16,30 Z" />
                                        <path class="color-background opacity-6"
                                            d="M40,30 C40,27.8 41.8,26 44,26 C46.2,26 48,27.8 48,30 L48,34 L40,34 L40,30 Z" />

                                        <path class="color-background"
                                            d="M12,36 C12,34.9 12.9,34 14,34 L50,34 C51.1,34 52,34.9 52,36 L52,48 C52,49.1 51.1,50 50,50 L14,50 C12.9,50 12,49.1 12,48 L12,36 Z M20,44 C21.7,44 23,42.7 23,41 C23,39.3 21.7,38 20,38 C18.3,38 17,39.3 17,41 C17,42.7 18.3,44 20,44 Z M44,44 C45.7,44 47,42.7 47,41 C47,39.3 45.7,38 44,38 C42.3,38 41,39.3 41,41 C41,42.7 42.3,44 44,44 Z" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <span class="nav-link-text me-1"> الحجوزات </span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">الجداول</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">الفواتير</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>box-3d-50</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(603.000000, 0.000000)">
                                                <path class="color-background"
                                                    d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">الواقع الافتراضي</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">حساب تعريفي</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>document</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(154.000000, 300.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">تسجيل الدخول</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md ms-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="20px" viewBox="0 0 40 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>spaceship</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(4.000000, 301.000000)">
                                                <path class="color-background"
                                                    d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text me-1">اشتراك</span>
                    </a>
                </li> --}}
            </ul>
        </div>

    </aside>
