@extends('layouts.dashboard')

@section('content')

    <div class="row">
    
        <div class="col-sm-12">
            <div class="box">

                <div class="box-header">
                    <h2>{{ __('strings.Create Role') }}</h2>
                </div>
                
                <div class="box-divider m-0"></div>
                
                <div class="box-body">

                    {{ Aire::open()->route('dashboard.core.roles.store')->method('post') }}

                        @include('dashboard.core.roles.form')

                        {{ Aire::submit(__('strings.create'))->addClass('btn primary') }}

                    {{ Aire::close() }}
                </div>
            </div>
        </div>

    </div>

@endsection