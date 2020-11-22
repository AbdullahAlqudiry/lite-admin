@extends('layouts.dashboard')

@section('content')

    <div class="row">
    
        <div class="col-sm-12">
            <div class="box">

                <div class="box-header">
                    <h2>{{ __('strings.roles') }}</h2>
                </div>

                <div class="box-tool">
                    <ul class="nav nav-xs">

                        @can('dashboard_add_core_roles')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.core.roles.create') }}">
                                    <i class="fa fa-fw fa-plus"></i>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </div>
                
                <div class="box-divider m-0"></div>

                <div class="box-body">

                    {{ Aire::open()->route('dashboard.core.roles.index') }}
                        {{ Aire::input('search')->value(request()->search)->placeholder(__('strings.search')) }}
                    {{ Aire::close() }}

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('validation.attributes.name') }}</th>
                                    <th>Guard Name</th>
                                    <th style="width: 300px"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>

                                            @can('dashboard_edit_core_roles')
                                                <a href="{{ route('dashboard.core.roles.edit', $role) }}" class="md-btn md-flat w-xs text-warning">{{ __('strings.edit') }}</a>
                                            @endcan

                                            @can('dashboard_delete_core_roles')
                                                <a href="{{ route('dashboard.core.roles.destroy', $role) }}" class="md-btn md-flat w-xs text-danger delete-url-action">{{ __('strings.delete') }}</a>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    
                </div>
                
                <div class="box-footer">
                    {!! $roles->links('layouts.pagination.default') !!}
                </div>

            </div>
        </div>

    </div>

@endsection