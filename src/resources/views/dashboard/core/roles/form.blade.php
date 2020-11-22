<div class="row mb-3">
    {{ 
        Aire::input('name', __('validation.attributes.name'))
        ->required()
        ->groupClass('col-6')
    }}
    
    {{ 
        Aire::input('guard_name', 'Guard Name')
        ->required()
        ->groupClass('col-6')
    }}
</div>


<div class="row">

    <div class="col-sm-12">
        <div class="form-group">
            
            <label>{{ __('strings.permissions') }}</label>
            
            <div class="row">
                @foreach($permissions->groupBy('group_key') as $group => $groupPermissions)

                    <div class="col-md-3">
                        <u>{{ __('strings.roles_list.' . $group) }}</u>
                        <br /><br />

                        @foreach($groupPermissions as $perm)

                            @php 
                                $per_found = null;

                                if( isset($role) ) {
                                    $per_found = $role->hasPermissionTo($perm->name);
                                }
                                if( isset($user)) {
                                    $per_found = $user->hasDirectPermission($perm->name);
                                }
                            @endphp

                            <div class="checkbox">
                                <label class="{{ str_contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                    {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} {{ $perm->label }}
                                </label>
                            </div>

                        @endforeach
                    </div>
                    
                @endforeach
            </div>

        </div>
    </div>

</div>