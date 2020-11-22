@extends('layouts.dashboard')

@section('content')

    <div class="row">
    
        <div class="col-sm-12">
            <div class="box">

                <div class="box-header">
                    <h2>{{ __('strings.Create User') }}</h2>
                </div>
                
                <div class="box-divider m-0"></div>
                
                <div class="box-body">

                    {{ Aire::open()->route('dashboard.core.users.store')->method('post') }}

                        @include('dashboard.core.users.form')

                        <div class="row mb-3">
                            {{ 
                                Aire::password('password', __('validation.attributes.password'))
                                ->required()
                                ->groupClass('col-6')
                            }}
                            
                            {{ 
                                Aire::password('password_confirmation', __('validation.attributes.password_confirmation'))
                                ->required()
                                ->groupClass('col-6')
                            }}
                        </div>

                        {{ Aire::submit(__('strings.create'))->addClass('btn primary') }}

                    {{ Aire::close() }}
                </div>
            </div>
        </div>

    </div>

@endsection