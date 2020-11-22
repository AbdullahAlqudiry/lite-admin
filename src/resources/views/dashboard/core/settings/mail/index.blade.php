@extends('layouts.dashboard')

@section('content')

    <div class="row">
    
        <div class="col-sm-12">
            <div class="box">

                <div class="box-header">
                    <h2>{{ __('strings.system_settings_mail') }}</h2>
                </div>
                
                <div class="box-divider m-0"></div>
                
                <div class="box-body">

                    {{ Aire::open()->route('dashboard.core.settings.mail.store')->method('post') }}

                        <div class="row mb-3">
                            {{ 
                                Aire::select(['mailgun' => 'mailgun'], 'app_mail_mailer')
                                ->defaultValue(setting('app.mail.mailer', config('liteadmin.app_mail_mailer')))
                                ->required()
                                ->groupClass('col-6')
                                ->label(__('validation.attributes.app_mail_mailer'))
                            }}
                                
                            {{ 
                                Aire::input('app_mail_from_address', __('validation.attributes.app_mail_from_address'))
                                ->defaultValue(setting('app.mail.from.address', config('liteadmin.app_mail_from_address')))
                                ->required()
                                ->groupClass('col-6')
                            }}
                        </div>

                        <div class="row mb-3">
                            {{ 
                                Aire::input('app_mail_mailgun_domain', __('validation.attributes.app_mail_mailgun_domain'))
                                ->defaultValue(setting('app.mail.mailgun.domain'))
                                ->required()
                                ->groupClass('col-6')
                            }}
                                
                            {{ 
                                Aire::input('app_mail_mailgun_secret', __('validation.attributes.app_mail_mailgun_secret'))
                                ->defaultValue(setting('app.mail.mailgun.secret'))
                                ->required()
                                ->groupClass('col-6')
                            }}
                        </div>

                        {{ Aire::submit(__('strings.save'))->addClass('btn primary') }}

                    {{ Aire::close() }}
                </div>
            </div>
        </div>

    </div>

@endsection