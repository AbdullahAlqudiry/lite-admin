@extends('layouts.dashboard')

@section('content')

    <div class="row">
    
        <div class="col-sm-12">
            <div class="box">

                <div class="box-header">
                    <h2>{{ __('strings.system_settings_general') }}</h2>
                </div>
                
                <div class="box-divider m-0"></div>
                
                <div class="box-body">

                    {{ Aire::open()->route('dashboard.core.settings.general.store')->method('post') }}

                        <div class="row mb-3">
                            {{ 
                                Aire::input('app_name', __('validation.attributes.app_name'))
                                ->defaultValue(setting('app.name', config('liteadmin.app_name')))
                                ->required()
                                ->groupClass('col-6')
                            }}
                                
                            {{ 
                                Aire::input('app_version', __('validation.attributes.app_version'))
                                ->defaultValue(setting('app.version', config('liteadmin.app_version')))
                                ->required()
                                ->groupClass('col-6')
                            }}
                        </div>

                        <div class="row mb-3">
                            {{ 
                                Aire::textarea('app_description', __('validation.attributes.app_description'))
                                ->defaultValue(setting('app.description'))
                                ->required()
                                ->groupClass('col-6')
                            }}

                            {{ 
                                Aire::select(['en' => __('strings.english'), 'ar' => __('strings.arabic')], 'app_language')
                                ->defaultValue(setting('app.language', config('liteadmin.app_language')))
                                ->required()
                                ->groupClass('col-6')
                                ->label(__('validation.attributes.app_language'))
                            }}
                        </div>
                        
                        <div class="row mb-3">
                            {{
                                Aire::select(['local' => 'Local', 'production' => 'Production'], 'app_env')
                                ->defaultValue(setting('app.env', 'local'))
                                ->required()
                                ->groupClass('col-6')
                                ->label(__('validation.attributes.app_env'))
                            }}

                            {{
                                Aire::timezoneSelect('app_timezone', __('validation.attributes.app_timezone'))
                                ->required()
                                ->groupClass('col-6')
                                ->defaultValue(setting('app.timezone'))
                            }}
                        </div>


                        <div class="row mb-3">
                            {{ 
                                Aire::select([true => __('strings.yes'), false => __('strings.no')], 'app_allow_register')
                                ->defaultValue(setting('app.allow_register', true))
                                ->required()
                                ->groupClass('col-6')
                                ->label(__('validation.attributes.app_allow_register'))
                            }}
                            
                            {{ 
                                Aire::select([true => __('strings.yes'), false => __('strings.no')], 'app_allow_reset_password')
                                ->defaultValue(setting('app.allow_reset_password', true))
                                ->required()
                                ->groupClass('col-6')
                                ->label(__('validation.attributes.app_allow_reset_password'))
                            }}
                        </div>

                        {{ Aire::submit(__('strings.save'))->addClass('btn primary') }}

                    {{ Aire::close() }}
                </div>
            </div>
        </div>

    </div>

@endsection