@extends('layouts.auth')

@section('content')

    <div class="mt-10 py-5 w-100">
        <div class="mx-auto w-xxl w-auto-xs">
            <div class="px-3">
                
                <div class="mb-4 text-center">
                    <h5>{{ __('strings.Reset Password') }}</h5>
                </div>

                {{ Aire::open()->route('password.update')->method('post') }}
                    
                    {{ Aire::hidden('token', $token) }}

                    {{ Aire::email('email', __('validation.attributes.email'))->defaultValue($email)->required() }}
                    
                    {{ Aire::password('password', __('validation.attributes.password'))->required() }}
                    
                    {{ Aire::password('password_confirmation', __('validation.attributes.password_confirmation'))->required() }}

                    <div class="py-2 text-center">
                        {{ Aire::submit(__('strings.Reset Password'))->addClass('btn primary') }}
                    </div>
                    
                {{ Aire::close() }}
           
            </div>
        </div>
    </div>

@endsection