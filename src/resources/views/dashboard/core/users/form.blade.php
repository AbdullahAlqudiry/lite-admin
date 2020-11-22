<div class="row mb-3">
    {{ 
        Aire::input('name', __('validation.attributes.name'))
        ->required()
        ->groupClass('col-6')
    }}
    
    {{ 
        Aire::email('email', __('validation.attributes.email'))
        ->required()
        ->groupClass('col-6')
    }}
</div>

<div class="row mb-3">
    {{ 
        Aire::select($roles, 'role_id', __('validation.attributes.role_id'))
        ->required()
        ->groupClass('col-6')
    }}
    
</div>