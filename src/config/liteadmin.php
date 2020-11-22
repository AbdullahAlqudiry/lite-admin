<?php 


    return [

        'app_name' => 'Lite Admin',
        'app_language' => 'en',
        'app_version' => '1.0',
        'app_mail_mailer' => 'mailgun',
        'app_mail_from_address' => 'noreplay@lite-admin.com',
        
        // Left menu
        'app_menu' => [

            'main' => [
                
                'title' => 'main', 

                'links' => [
                    [
                        'title' => 'login',
                        'icon' => 'fa fa-user-o',
                        'url' => '/login',
                        'user_status' => 'guest',
                    ],
        
                    [
                        'title' => 'register',
                        'icon' => 'fa fa-user-o',
                        'url' => '/register',
                        'user_status' => 'guest',
                    ],
        
                    [
                        'title' => 'dashboard',
                        'icon' => 'fa fa-user-o',
                        'url' => '/dashboard',
                        'user_status' => 'auth',
                    ],
                ]

            ],
            
            'system_settings' => [

                'title' => 'system', 
                'user_status' => 'auth',
                'can' => [
                    'dashboard_view_core_statistics',
                    'dashboard_view_core_roles',
                    'dashboard_view_core_users',
                    'dashboard_view_core_settings_general',
                    'dashboard_view_core_settings_mail'
                ],

                'links' => [

                    [
                        'title' => 'system_statistics',
                        'icon' => 'fa fa-eye',
                        'url' => '/dashboard/core/statistics',
                        'user_status' => 'auth',
                        'can' => ['dashboard_view_core_statistics'],
                    ],

                    [
                        'title' => 'system_roles',
                        'icon' => 'fa fa-eye',
                        'url' => '/dashboard/core/roles',
                        'user_status' => 'auth',
                        'can' => ['dashboard_view_core_roles'],
                    ],

                    [
                        'title' => 'system_users',
                        'icon' => 'fa fa-users',
                        'url' => '/dashboard/core/users',
                        'user_status' => 'auth',
                        'can' => ['dashboard_view_core_users'],
                    ],

                    [
                        'title' => 'system_settings',
                        'icon' => 'fa fa-cogs',
                        'url' => '',
                        'user_status' => 'auth',
                        'can' => [
                            'dashboard_view_core_settings_general',
                            'dashboard_view_core_settings_mail'
                        ],

                        'childrens' => [
                            
                            [
                                'title' => 'system_settings_general',
                                'icon' => 'fa fa-cogs',
                                'url' => '/dashboard/core/settings/general',
                                'user_status' => 'auth',
                                'can' => ['dashboard_view_core_settings_general'],
                            ],

                            [
                                'title' => 'system_settings_mail',
                                'icon' => 'fa fa-cogs',
                                'url' => '/dashboard/core/settings/mail',
                                'user_status' => 'auth',
                                'can' => ['dashboard_view_core_settings_mail'],
                            ],
                        ]
                    ],
                
                ]
            ]

        ],


        'roles' => [
            
            'roles' => [
                'Admin',
                'User'
            ],

            'permissions' => [
                
                // Dashboard/Core/StatisticsController
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_statistics', 'name' => 'dashboard_view_core_statistics', 'label' => 'show app statistics'],

                // Dashboard/Core/Settings/GeneralController
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_settings', 'name' => 'dashboard_view_core_settings_general', 'label' => 'show general settings'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_settings', 'name' => 'dashboard_add_core_settings_general', 'label' => 'edit general settings'],

                // Dashboard/Core/Settings/MailController
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_settings', 'name' => 'dashboard_view_core_settings_mail', 'label' => 'show mail settings'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_settings', 'name' => 'dashboard_add_core_settings_mail', 'label' => 'edit mail settings'],

                // Dashboard/Core/UsersController
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_users', 'name' => 'dashboard_view_core_users', 'label' => 'show users'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_users', 'name' => 'dashboard_add_core_users', 'label' => 'create new user'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_users', 'name' => 'dashboard_edit_core_users', 'label' => 'edit user'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_users', 'name' => 'dashboard_delete_core_users', 'label' => 'delete user'],
                
                // Dashboard/Core/RolesController
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_roles', 'name' => 'dashboard_view_core_roles', 'label' => 'show roles'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_roles', 'name' => 'dashboard_add_core_roles', 'label' => 'create new role'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_roles', 'name' => 'dashboard_edit_core_roles', 'label' => 'edit role'],
                ['guard_name' => 'web', 'group_key' => 'dashboard_core_roles', 'name' => 'dashboard_delete_core_roles', 'label' => 'delete role'],
        
            ],

        ]

    ];


?>