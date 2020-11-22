@extends('layouts.dashboard')

@section('content')

    <div class="row">
    
        <div class="col-sm-12">
            <div class="box">

                <div class="box-header">
                    <h2>{{ __('strings.users') }}</h2>
                </div>
                
                <div class="box-tool">
                    <ul class="nav nav-xs">

                        @can('dashboard_add_core_users')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.core.users.create') }}">
                                    <i class="fa fa-fw fa-plus"></i>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </div>

                <div class="box-divider m-0"></div>

                <div class="box-body">

                    {{ Aire::open()->route('dashboard.core.users.index') }}
                        {{ Aire::input('search')->value(request()->search)->placeholder(__('strings.search')) }}
                    {{ Aire::close() }}

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('validation.attributes.name') }}</th>
                                    <th>{{ __('validation.attributes.email') }}</th>
                                    <th>{{ __('validation.attributes.role_id') }}</th>
                                    <th style="width: 300px"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><span class="badge badge-pill success">{{ $user->role_name }}</span></td>
                                        <td>
                                            @can('dashboard_edit_core_users')
                                                <a href="{{ route('dashboard.core.users.edit', $user) }}" class="md-btn md-flat w-xs text-warning">{{ __('strings.edit') }}</a>
                                            @endcan

                                            @can('dashboard_delete_core_users')
                                                <a href="{{ route('dashboard.core.users.destroy', $user) }}" class="md-btn md-flat w-xs text-danger delete-url-action">{{ __('strings.delete') }}</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                
                <div class="box-footer">
                    {!! $users->links('layouts.pagination.default') !!}
                </div>

            </div>
        </div>

    </div>

@endsection