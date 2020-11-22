@extends('layouts.auth')

@section('content')

    <div class="mt-10 py-5 w-100">
        <div class="mx-auto w-xxl w-auto-xs">
            <div class="px-3">
                
                <div class="mb-4 text-center">
                    <h5>{{ __('strings.Reset Password') }}</h5>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ Aire::open()->route('password.email')->method('post') }}
                        
                    {{ Aire::email('email', __('validation.attributes.email'))->required() }}
                    
                    <div class="py-2 text-center">
                        {{ Aire::submit(__('passwords.Send Password Reset Link'))->addClass('btn primary') }}
                    </div>
                    
                {{ Aire::close() }}
           
            </div>
        </div>
    </div>

@endsection