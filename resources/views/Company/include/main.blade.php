@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="mb-4 col-lg-3 col-sm-6 mb-lg-0">
            <div class="card">
                <div class="p-3 card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="mb-0 text-sm text-capitalize font-weight-bold">أموال اليوم</p>
                                <h5 class="mb-0 font-weight-bolder">
                                    $53,000
                                    <span class="text-sm text-success font-weight-bolder">+55%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-start">
                            <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                                <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 col-lg-3 col-sm-6 mb-lg-0">
            <div class="card">
                <div class="p-3 card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="mb-0 text-sm text-capitalize font-weight-bold">مستخدمو اليوم</p>
                                <h5 class="mb-0 font-weight-bolder">
                                    2,300
                                    <span class="text-sm text-success font-weight-bolder">+33%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-start">
                            <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                                <i class="text-lg ni ni-world opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 col-lg-3 col-sm-6 mb-lg-0">
            <div class="card">
                <div class="p-3 card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="mb-0 text-sm text-capitalize font-weight-bold">عملاء جدد</p>
                                <h5 class="mb-0 font-weight-bolder">
                                    +3,462
                                    <span class="text-sm text-danger font-weight-bolder">-2%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-start">
                            <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                                <i class="text-lg ni ni-paper-diploma opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="p-3 card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="mb-0 text-sm text-capitalize font-weight-bold">مبيعات</p>
                                <h5 class="mb-0 font-weight-bolder">
                                    $103,430
                                    <span class="text-sm text-success font-weight-bolder">+5%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-start">
                            <div class="text-center shadow icon icon-shape bg-gradient-primary border-radius-md">
                                <i class="text-lg ni ni-cart opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 row">
        <div class="mb-4 col-lg-7 mb-lg-0">
            <div class="card">
                <div class="p-3 card-body">
                    <div class="row">
                        <div class="mb-4 col-lg-6 mb-lg-0">
                            <div class="d-flex flex-column h-100">
                                <p class="pt-2 mb-1 text-bold">بناها المطورون</p>
                                <h5 class="font-weight-bolder">Soft UI Dashboard</h5>
                                <p class="mb-5">من الألوان والبطاقات والطباعة إلى العناصر المعقدة ، ستجد
                                    الوثائق الكاملة.</p>
                                <a class="mt-auto mb-0 text-dark font-weight-bold ps-1 icon-move-left" href="javascript:;">
                                    اقرأ المستندات
                                    <i class="text-sm fas fa-arrow-left ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="text-center col-lg-4 me-auto ms-0">
                            <div class="bg-gradient-primary border-radius-lg min-height-200">
                                <img src="{{ asset('assets/img/shapes/waves-white.svg') }}"
                                    class="top-0 position-absolute h-100 d-md-block d-none" alt="waves">
                                <div class="pt-5 pb-4 position-relative">
                                    <img class="max-width-500 w-100 position-relative z-index-2"
                                        src="{{ asset('assets/img/illustrations/rocket-white.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="p-3 card h-100">
                <div class="overflow-hidden bg-cover position-relative border-radius-lg h-100"
                    style="background-image: url('{{ asset('assets/img/ivancik.jpg') }}');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="p-3 card-body position-relative z-index-1 h-100">
                        <div class="d-flex flex-column h-100">
                            <h5 class="pt-2 mb-4 text-white font-weight-bolder">العمل مع الصواريخ</h5>
                            <p class="mb-5 text-white">تكوين الثروة هو لعبة تطوري حديثة ذات حصيلة إيجابية.
                                الأمر كله يتعلق بمن يغتنم الفرصة أولاً هذه بطاقة بسيطة.</p>
                            <a class="mt-auto mb-0 text-white font-weight-bold ps-1 icon-move-left" href="javascript:;">اقرأ
                                المستندات
                                <i class="text-sm fas fa-arrow-left ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 row">
        <div class="mb-4 col-lg-5 mb-lg-0">
            <div class="card">
                <div class="p-3 card-body">
                    <div class="py-3 mb-3 bg-gradient-dark border-radius-lg pe-1">
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas" height="170px"></canvas>
                        </div>
                    </div>
                    <h6 class="mt-4 mb-0 ms-2"> المستخدمين النشطين </h6>
                    <p class="text-sm ms-2"> (<span class="font-weight-bolder">+23%</span>) من الأسبوع الماضي
                    </p>
                    <div class="container border-radius-lg">
                        <div class="row">
                            <div class="py-3 col-3 ps-0">
                                <div class="mb-2 d-flex">
                                    <div
                                        class="text-center shadow icon icon-shape icon-xxs border-radius-sm bg-gradient-primary ms-2 d-flex align-items-center justify-content-center">
                                        <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>document</title>
                                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)"
                                                    fill="#FFFFFF" fill-rule="nonzero">
                                                    <g id="Icons-with-opacity"
                                                        transform="translate(1716.000000, 291.000000)">
                                                        <g id="document" transform="translate(154.000000, 300.000000)">
                                                            <path class="color-background"
                                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                                id="Path" opacity="0.603585379"></path>
                                                            <path class="color-background"
                                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"
                                                                id="Shape"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="mt-1 mb-0 text-xs font-weight-bold">المستخدمون</p>
                                </div>
                                <h4 class="font-weight-bolder">36K</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="py-3 col-3 ps-0">
                                <div class="mb-2 d-flex">
                                    <div
                                        class="text-center shadow icon icon-shape icon-xxs border-radius-sm bg-gradient-info ms-2 d-flex align-items-center justify-content-center">
                                        <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>spaceship</title>
                                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Rounded-Icons" transform="translate(-1720.000000, -592.000000)"
                                                    fill="#FFFFFF" fill-rule="nonzero">
                                                    <g id="Icons-with-opacity"
                                                        transform="translate(1716.000000, 291.000000)">
                                                        <g id="spaceship" transform="translate(4.000000, 301.000000)">
                                                            <path class="color-background"
                                                                d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"
                                                                id="Shape"></path>
                                                            <path class="color-background"
                                                                d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"
                                                                id="Path"></path>
                                                            <path class="color-background"
                                                                d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"
                                                                id="color-2" opacity="0.598539807"></path>
                                                            <path class="color-background"
                                                                d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"
                                                                id="color-3" opacity="0.598539807"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="mt-1 mb-0 text-xs font-weight-bold">نقرات</p>
                                </div>
                                <h4 class="font-weight-bolder">2m</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="py-3 col-3 ps-0">
                                <div class="mb-2 d-flex">
                                    <div
                                        class="text-center shadow icon icon-shape icon-xxs border-radius-sm bg-gradient-warning ms-2 d-flex align-items-center justify-content-center">
                                        <svg width="10px" height="10px" viewBox="0 0 43 36" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Rounded-Icons" transform="translate(-2169.000000, -745.000000)"
                                                    fill="#FFFFFF" fill-rule="nonzero">
                                                    <g id="Icons-with-opacity"
                                                        transform="translate(1716.000000, 291.000000)">
                                                        <g id="credit-card" transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background"
                                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                id="Path" opacity="0.593633743"></path>
                                                            <path class="color-background"
                                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"
                                                                id="Shape"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="mt-1 mb-0 text-xs font-weight-bold">مبيعات</p>
                                </div>
                                <h4 class="font-weight-bolder">435$</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-30" role="progressbar" aria-valuenow="30"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="py-3 col-3 ps-0">
                                <div class="mb-2 d-flex">
                                    <div
                                        class="text-center shadow icon icon-shape icon-xxs border-radius-sm bg-gradient-danger ms-2 d-flex align-items-center justify-content-center">
                                        <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>settings</title>
                                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)"
                                                    fill="#FFFFFF" fill-rule="nonzero">
                                                    <g id="Icons-with-opacity"
                                                        transform="translate(1716.000000, 291.000000)">
                                                        <g id="settings" transform="translate(304.000000, 151.000000)">
                                                            <polygon class="color-background" id="Path"
                                                                opacity="0.596981957"
                                                                points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                            </polygon>
                                                            <path class="color-background"
                                                                d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                                id="Path" opacity="0.596981957"></path>
                                                            <path class="color-background"
                                                                d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"
                                                                id="Path"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="mt-1 mb-0 text-xs font-weight-bold">العناصر</p>
                                </div>
                                <h4 class="font-weight-bolder">43</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="pb-0 card-header">
                    <h6>نظرة عامة على المبيعات</h6>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">4% أكثر</span> في عام 2021
                    </p>
                </div>
                <div class="p-3 card-body">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4 row">
        <div class="mb-4 col-lg-8 col-md-6 mb-md-0">
            <div class="card">
                <div class="pb-0 card-header">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <h6>المشاريع</h6>
                            <p class="text-sm">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">30 انتهى</span> هذا الشهر
                            </p>
                        </div>
                        <div class="my-auto col-6 text-start">
                            <div class="dropdown float-start ps-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="px-2 py-3 dropdown-menu me-n4" aria-labelledby="dropdownTable">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">عمل</a>
                                    </li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">عمل
                                            آخر</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">شيء آخر
                                            هنا</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-0 pb-2 card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        المشروع</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        أعضاء</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ميزانية</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        إكمال</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/logo-xd.svg') }}"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Soft UI XD الإصدار</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-2 avatar-group">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-1.jpg') }}">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-2.jpg') }}">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Alexander Smith">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-3.jpg') }}">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-4.jpg') }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="text-xs font-weight-bold"> $14,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="mx-auto progress-wrapper w-75">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">60%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/logo-atlassian.svg') }}"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف مسار التقدم إلى التطبيق الداخلي
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-2 avatar-group">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-2.jpg') }}">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-4.jpg') }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="text-xs font-weight-bold"> $3,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="mx-auto progress-wrapper w-75">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">10%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="w-10 progress-bar bg-gradient-info" role="progressbar"
                                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/logo-slack.svg') }}"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إصلاح أخطاء النظام الأساسي</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-2 avatar-group">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-3.jpg') }}">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-1.jpg') }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="text-xs font-weight-bold"> غير مضبوط </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="mx-auto progress-wrapper w-75">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/logo-spotify.svg') }}"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إطلاق تطبيق الهاتف المحمول الخاص بنا
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-2 avatar-group">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-4.jpg') }}">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-3.jpg') }}">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Alexander Smith">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-4.jpg') }}">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-1.jpg') }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="text-xs font-weight-bold"> $20,500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="mx-auto progress-wrapper w-75">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/logo-jira.svg') }}"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف صفحة التسعير الجديدة</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-2 avatar-group">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-4.jpg') }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="mx-auto progress-wrapper w-75">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">25%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/logo-invision.svg') }}"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إعادة تصميم متجر جديد على الإنترنت
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-2 avatar-group">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-1.jpg') }}">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img alt="Image placeholder" src="{{ asset('assets/img/team-4.jpg') }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="text-xs font-weight-bold"> $2,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="mx-auto progress-wrapper w-75">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">40%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="w-40 progress-bar bg-gradient-info" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="pb-0 card-header">
                    <h6>نظرة عامة على الطلبات</h6>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                        <span class="font-weight-bold">24%</span> هذا الشهر
                    </p>
                </div>
                <div class="p-3 card-body">
                    <div class="timeline timeline-one-side">
                        <div class="mb-3 timeline-block">
                            <span class="timeline-step">
                                <i class="ni ni-bell-55 text-success text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="mb-0 text-sm text-dark font-weight-bold">$2400, تغييرات في التصميم
                                </h6>
                                <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">22 DEC 7:20 PM</p>
                            </div>
                        </div>
                        <div class="mb-3 timeline-block">
                            <span class="timeline-step">
                                <i class="ni ni-html5 text-danger text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="mb-0 text-sm text-dark font-weight-bold">طلب جديد #1832412</h6>
                                <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">21 DEC 11 PM</p>
                            </div>
                        </div>
                        <div class="mb-3 timeline-block">
                            <span class="timeline-step">
                                <i class="ni ni-cart text-info text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="mb-0 text-sm text-dark font-weight-bold">مدفوعات الخادم لشهر أبريل
                                </h6>
                                <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">21 DEC 9:34 PM</p>
                            </div>
                        </div>
                        <div class="mb-3 timeline-block">
                            <span class="timeline-step">
                                <i class="ni ni-credit-card text-warning text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="mb-0 text-sm text-dark font-weight-bold">تمت إضافة بطاقة جديدة للطلب
                                    #4395133</h6>
                                <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">20 DEC 2:20 AM</p>
                            </div>
                        </div>
                        <div class="mb-3 timeline-block">
                            <span class="timeline-step">
                                <i class="ni ni-key-25 text-primary text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="mb-0 text-sm text-dark font-weight-bold">فتح الحزم من أجل التطوير
                                </h6>
                                <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">18 DEC 4:54 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block">
                            <span class="timeline-step">
                                <i class="ni ni-money-coins text-dark text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="mb-0 text-sm text-dark font-weight-bold">طلب جديد #9583120</h6>
                                <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">17 DEC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
