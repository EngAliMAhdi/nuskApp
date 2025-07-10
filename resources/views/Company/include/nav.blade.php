        <nav class="px-0 mx-4 shadow-none navbar navbar-main navbar-expand-lg border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="px-3 py-1 container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="px-0 pt-1 pb-0 mb-0 bg-transparent breadcrumb ">
                        <li class="text-sm breadcrumb-item ps-2">
                            @yield('title')</li>
                        <li class="text-sm breadcrumb-item text-dark active" aria-current="page"> @yield('main_title_content')</li>
                    </ol>
                    <h6 class="mb-0 font-weight-bolder">@yield('title_content')</h6>
                </nav>
                <div class="px-0 mt-2 collapse navbar-collapse mt-sm-0" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="أكتب هنا...">
                        </div>
                    </div>
                    <ul class="navbar-nav me-auto ms-0 justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('company.logout') }}" class="px-0 nav-link text-body font-weight-bold">
                                <i class="fa fa-sign-out-alt me-sm-1"></i>
                                {{-- <i class="fa fa-user me-sm-1"></i> --}}
                                <span class="d-sm-inline d-none">تسجيل خروج </span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
                            <a href="javascript:;" class="p-0 nav-link text-body" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="px-3 nav-item d-flex align-items-center">
                            <a href="javascript:;" class="p-0 nav-link text-body">
                                <i class="cursor-pointer fa fa-cog fixed-plugin-button-nav"></i>
                            </a>
                        </li>
                        @php
                            use Illuminate\Support\Facades\Auth;

                            if (Auth::check()) {
                                $user = Auth::user();
                                $notifications = $user->unreadNotifications;
                            } else {
                                $notifications = collect();
                            }
                        @endphp
                        <li class="nav-item dropdown ps-2 d-flex align-items-center">
                            <a href="javascript:;" class="p-0 nav-link text-body" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="cursor-pointer fa fa-bell"></i>
                            </a>
                            <ul class="px-2 py-3 dropdown-menu me-sm-n4" aria-labelledby="dropdownMenuButton">
                                @if (isset($notifications) && count($notifications) > 0)
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md"
                                            href="{{ route('notifications.markAllRead') }}">
                                            <div class="py-1 d-flex">
                                                جميع الاشعارات مقروء
                                            </div>
                                        </a>
                                    </li>
                                    @foreach ($notifications as $item)
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md"
                                                href="{{ route('notifications.read', $item->id) }}">
                                                <div class="py-1 d-flex">
                                                    {{-- <div class="my-auto">
                                                        <img src="{{ asset('assets/img/team-2.jpg') }}"
                                                            class="avatar avatar-sm ms-3 ">
                                                    </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-1 text-sm font-weight-normal">
                                                            <span class="font-weight-bold">
                                                                {{ $item->data['title'] }}

                                                            </span>
                                                        </h6>
                                                        <p class="mb-0 text-xs text-secondary">
                                                            <i class="fa fa-clock me-1"></i>
                                                            {{ $item->created_at }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="py-1 d-flex">
                                                لا يوجد إشعارات
                                            </div>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
