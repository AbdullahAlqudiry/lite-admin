<!DOCTYPE html>
<html lang="{{ setting('app.language', config('liteadmin.app_language')) }}" dir="{{ setting('app.language', config('liteadmin.app_language')) == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    @include('layouts.components.header')
    @include('layouts.components.stylesheets')
</head>
<body>

    <div class="app" id="app">
    
        @include('layouts.components.sidenav')

        <div id="content" class="app-content box-shadow-0" role="main">

            <div class="content-header white  box-shadow-0" id="content-header">
                <div class="navbar navbar-expand-lg">

                    <a class="d-lg-none mx-2" data-toggle="modal" data-target="#aside">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                            <path d="M80 304h352v16H80zM80 248h352v16H80zM80 192h352v16H80z" />
                        </svg>
                    </a>

                    <div class="navbar-text nav-title flex" id="pageTitle"></div>
                        
                    <ul class="nav flex-row order-lg-2">

                        @if(auth()->user())
                            <li class="dropdown d-flex align-items-center">
                                <a href="#" data-toggle="dropdown" class="d-flex align-items-center">
                                    <span class="avatar w-32">
                                        <img src="{{ url('lite-admin/assets/images/user.jpg') }}" alt="...">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right w pt-0 mt-2 animate fadeIn">
                                    <a class="dropdown-item" href="profile.html">
                                        <span>Profile</span>
                                    </a>
                                    <a class="dropdown-item" href="app.inbox.html">
                                        <span class="float-right"><span class="badge info">6</span></span>
                                        <span>Settings</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" onclick="document.getElementById('user-logout-action').submit(); return false;">{{ __('strings.Sign out') }}</a>
                                </div>
                            </li>
                        @endif

                    </ul>

                </div>
            </div>

            <!-- Main -->
            <div class="content-main " id="content-main">
                <div class="padding" data-plugin="waves">

                    @if(session()->has('success-message'))
                        <div class="box-color success pos-rlt">
                            <span class="arrow left b-info"></span>
                            <div class="box-body">
                                {{ session()->get('success-message') }}
                            </div>
                        </div>
                    @endif
                    
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            <div class="content-footer white " id="content-footer">
                <div class="d-flex p-3">
                    <span class="text-sm text-muted flex">&copy; Copyright. {{ setting('app.name', config('liteadmin.app_name')) }}</span>
                    <div class="text-sm text-muted">Version {{ setting('app.version', config('liteadmin.app_version')) }}</div>
                </div>
            </div>
        </div>

    </div>

    @if(auth()->user())
        {{ Aire::open()->route('logout')->method('post')->id('user-logout-action') }}
        {{ Aire::close() }}
    @endif

    @include('layouts.components.scripts')

</body>
</html>
