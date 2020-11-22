@extends('layouts.auth')

@section('content')

    <div class="mt-10 py-5 w-100">
        <div class="mx-auto w-xxl w-auto-xs">
            <div class="px-3">
                
                <div class="mb-4 text-center">
                    <h5>{{ __('strings.Sign in') }}</h5>
                </div>

                {{ Aire::open()->route('login')->method('post') }}
                        
                    {{ Aire::email('email', __('validation.attributes.email'))->required() }}

                    {{ Aire::password('password', __('validation.attributes.password'))->required() }}
                    
                    <div class="py-4 text-center">
                        {{ Aire::submit(__('strings.Sign in'))->addClass('btn primary') }}
                    </div>
                    
                {{ Aire::close() }}
                    
                @if (setting('app.allow_reset_password', true))       
                    <div class="my-4 text-center">
                        <a href="{{ route('password.request') }}" class="text-primary _600">{{ __('strings.Forgot password') }}</a>
                    </div>
                @endif
                    
                @if (setting('app.allow_register', true))       
                    <div class="my-4 text-center">
                        {{ __('strings.Do not have an account') }}
                        <a href="{{ route('register') }}" class="text-primary _600">{{ __('strings.Sign up') }}</a>
                    </div>
                @endif
        
            </div>
        </div>
    </div>

@endsection
