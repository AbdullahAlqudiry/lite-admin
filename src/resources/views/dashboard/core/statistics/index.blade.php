@extends('layouts.dashboard')

@section('content')

    <div class="row">

        <div class="col-6 col-lg-3">
            <div class="box p-3 white">
                <div class="d-flex">
                    <span class="text-muted">{{ __('statistics.Total Roles') }}</span>
                </div>
                <div class="py-3 text-center text-lg text-primary">{{ $totalUsers }}</div>
                <div class="d-flex">
                    <span class="flex text-muted">{{ __('statistics.Last Week') }}</span>
                    <span>{{ $totalUsersLastWeek }}</span>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="box p-3 white">
                <div class="d-flex">
                    <span class="text-muted">{{ __('statistics.Total Users') }}</span>
                </div>
                <div class="py-3 text-center text-lg text-success">{{ $totalUsers }}</div>
                <div class="d-flex">
                    <span class="flex text-muted">{{ __('statistics.Last Week') }}</span>
                    <span>{{ $totalUsersLastWeek }}</span>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="box p-3 white">
                <div class="d-flex">
                    <span class="text-muted">{{ __('statistics.Total Visits') }}</span>
                </div>
                <div class="py-3 text-center text-lg text-warning">{{ $totalVisits }}</div>
                <div class="d-flex">
                    <span class="flex text-muted">{{ __('statistics.Last Week') }}</span>
                    <span>{{ $totalVisitsLastWeek }}</span>
                </div>
            </div>
        </div>
        
    </div>

@endsection