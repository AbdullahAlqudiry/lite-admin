<base href="{{ url('/') }}">
<meta charset="utf-8" />
<title>{{ setting('app.name', config('liteadmin.app_name')) }}</title>
<meta name="description" content="{{ setting('app.description') }}" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- for ios 7 style, multi-resolution icon of 152x152 -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
<link rel="apple-touch-icon" href="{{ url('lite-admin/assets/images/logo.svg') }}">
<meta name="apple-mobile-web-app-title" content="Flatkit">
    
<!-- for Chrome on Android, multi-resolution icon of 196x196 -->
<meta name="mobile-web-app-capable" content="yes">
<link rel="shortcut icon" sizes="196x196" href="{{ url('lite-admin/assets/images/logo.svg') }}">