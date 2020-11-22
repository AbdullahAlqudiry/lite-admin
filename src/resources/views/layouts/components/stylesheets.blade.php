<!-- style -->
{!! Html::style('lite-admin/assets/libs/font-awesome/css/font-awesome.min.css') !!}

{!! Html::style('lite-admin/assets/libs/bootstrap/dist/css/bootstrap.min.css') !!}
{!! Html::style('lite-admin/assets/libs/sweetalert2/sweetalert2.min.css') !!}
{!! Html::style('lite-admin/assets/libs/select2/dist/css/select2.min.css') !!}
{!! Html::style('lite-admin/assets/css/app.css') !!}
{!! Html::style('lite-admin/assets/css/style.css') !!}
{!! Html::style('lite-admin/assets/css/theme/primary.css') !!}
<!-- style -->

@if(setting('app.language', config('liteadmin.app_language')) == 'ar')
    {!! Html::style('lite-admin/assets/css/app.rtl.css') !!}
@endif