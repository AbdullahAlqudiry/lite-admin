@extends('layouts.auth')

@section('content')

    <div class="mt-10 py-5 w-100">
        <div class="mx-auto w-xxl w-auto-xs">
            <div class="px-3">
                
                <div class="mb-4 text-center">
                    <h5>{{ __('strings.Sign up') }}</h5>
                </div>

                {{ Aire::open()->route('register')->method('post') }}
                        
                    {{ Aire::input('name', __('validation.attributes.name'))->required() }}

                    {{ Aire::email('email', __('validation.attributes.email'))->required() }}

                    {{ Aire::password('password', __('validation.attributes.password'))->required() }}
                    
                    {{ Aire::password('password_confirmation', __('validation.attributes.password_confirmation'))->required() }}

                    <div class="py-4 text-center">
                        {{ Aire::submit(__('strings.Sign up'))->addClass('btn primary') }}
                    </div>

                {{ Aire::close() }}

                    
                <div class="my-4 text-center">
                    {{ __('strings.Already have an account') }}
                    <a href="{{ route('login') }}" class="text-primary _600">{{ __('strings.Sign in') }}</a>
                </div>
        
            </div>
        </div>
    </div>

@endsection
