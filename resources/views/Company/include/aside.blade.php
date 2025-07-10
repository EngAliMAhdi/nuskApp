    <aside
        class="my-3 border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-end me-3 rotate-caret"
        id="sidenav-main">
        <div class="sidenav-header ">
            <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute start-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="m-0 navbar-brand" href="{{ route('company.dashboard') }}" target="_blank">
                <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="me-1 font-weight-bold">نسك للعمرة</span>
            </a>
        </div>
        <hr class="mt-0 mb-2 horizontal dark">
        <div class="w-auto px-0 collapse navbar-collapse max-height-vh-100 h-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('company/dashboard*') ? 'active' : '' }}"
                        href="{{ route('company.dashboard') }}">
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

                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('company/package*') ? 'active' : '' }} "
                        href="{{ route('packages1.index') }}">
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
                    <a class="nav-link {{ request()->is('company/booking*') ? 'active' : '' }} "
                        href="{{ route('booking2.index') }}">
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
            </ul>
        </div>

    </aside>
