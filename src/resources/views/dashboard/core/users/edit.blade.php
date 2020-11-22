@extends('layouts.dashboard')

@section('content')

    <div class="row">
    
        <div class="col-sm-12">
            <div class="box">

                <div class="box-header">
                    <h2>{{ __('strings.Edit User') }}: {{ $user->name }}</h2>
                </div>
                
                <div class="box-divider m-0"></div>
                
                <div class="box-body">

                    {{ Aire::open()->route('dashboard.core.users.update', $user)->bind($user)->method('put') }}

                        @include('dashboard.core.users.form')

                        {{ Aire::submit(__('strings.save'))->addClass('btn primary') }}

                    {{ Aire::close() }}
                </div>
            </div>
        </div>

    </div>

@endsection