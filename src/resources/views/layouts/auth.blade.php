<!DOCTYPE html>
<html lang="{{ setting('app.language', config('liteadmin.app_language')) }}" dir="{{ setting('app.language', config('liteadmin.app_language')) == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    @include('layouts.components.header')
    @include('layouts.components.stylesheets')
</head>
<body>

    <div class="d-flex flex-column flex">

        <div class="navbar light bg pos-rlt box-shadow">
            <div class="mx-auto">
                <a href="index.html" class="navbar-brand">
                    <span class="hidden-folded d-inline">{{ setting('app.name', config('liteadmin.app_name')) }}</span>
                </a>
            </div>
        </div>

        <div id="content-body">
            @yield('content')
        </div>
    </div>
    
    @include('layouts.components.scripts')

</body>
</html>
