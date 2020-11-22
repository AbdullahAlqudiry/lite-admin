<div id="aside" class="app-aside fade box-shadow-x nav-expand white dark" aria-hidden="true">
    <div class="sidenav modal-dialog dk white">

        <div class="navbar lt">
            <a href="index.html" class="navbar-brand">
                <span class="hidden-folded d-inline">{{ setting('app.name', config('liteadmin.app_name')) }}</span>
            </a>
        </div>

        <div class="flex hide-scroll">
            <div class="scroll">
                <div class="nav-border b-primary" data-nav>
                    <ul class="nav bg">
                        <li class="nav-header">
                            <div class="py-3">
                                <a href="#" class="btn btn-sm success theme-accent btn-block">
                                    <i class="fa fa-fw fa-plus"></i>
                                    <span class="hidden-folded d-inline">New Project</span>
                                </a>
                            </div>
                        </li>

                        @foreach(config('liteadmin.app_menu') as $key => $links)

                            @php
                                if(isset($links['user_status']) && $links['user_status'] == 'auth' && auth()->guest()) {
                                    continue;
                                }
                                else if(isset($links['user_status']) && $links['user_status'] == 'guest' && !auth()->guest()) {
                                    continue;
                                }

                                if(isset($links['can']) && !auth()->guest() && !auth()->user()->hasAnyPermission($links['can'])) {
                                    continue;
                                }
                            @endphp

                            <li class="nav-header">
                                <span class="text-xs hidden-folded">{{ __('liteadmin.app_menu.' . $links['title']) }}</span>
                            </li>

                            @foreach($links['links'] as $key => $menu)
                                
                                @php
                                    if(isset($menu['user_status']) && $menu['user_status'] == 'auth' && auth()->guest()) {
                                        continue;
                                    }
                                    else if(isset($menu['user_status']) && $menu['user_status'] == 'guest' && !auth()->guest()) {
                                        continue;
                                    }

                                    if(isset($menu['can']) && !auth()->guest() && !auth()->user()->hasAnyPermission($menu['can'])) {
                                        continue;
                                    }

                                    $hasChildrens = isset($menu['childrens']);
                                @endphp

                                <li>
                                    <a {!! !$hasChildrens ? 'href="' . $menu['url'] .'"' : '' !!}>

                                        @if($hasChildrens)
                                            <span class="nav-caret"><i class="fa fa-caret-down"></i></span>
                                        @endif

                                        <span class="nav-icon"><i class="{{ $menu['icon'] }}"></i></span>
                                        <span class="nav-text">{{ __('liteadmin.app_menu.' . $menu['title']) }}</span>
                                    </a>

                                    @if($hasChildrens)
                                        <ul class="nav-sub nav-mega">
                                            @foreach($menu['childrens'] as $childrenKey => $children)

                                                @php
                                                    if(isset($children['user_status']) && $children['user_status'] === 'auth' && auth()->guest()) {
                                                        continue;
                                                    }
                                                    else if(isset($children['user_status']) && $children['user_status'] === 'quest' && !auth()->guest()) {
                                                        continue;
                                                    }

                                                    if(isset($children['can']) && !auth()->guest() && !auth()->user()->hasAnyPermission($children['can'])) {
                                                        continue;
                                                    }
                                                @endphp

                                                <li>
                                                    <a href="{{ $children['url'] }}">
                                                        <span class="nav-text">{{ __('liteadmin.app_menu.' . $children['title']) }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </li>
                            
                            @endforeach

                        @endforeach

                    </ul>

                </div>
            </div>
        </div>

        @if(auth()->user())
            <div class="no-shrink lt">
                <div class="nav-fold">
                    <div class="hidden-folded flex p-2-3 bg">

                        <div class="d-flex p-1">
                            <a href="app.inbox.html" class="flex text-nowrap">
                                <i class="fa fa-bell text-muted mr-1"></i>
                                <span class="badge badge-pill theme">20</span>
                            </a>

                            <a href="#" class="px-2" data-toggle="tooltip" title="{{ __('strings.Sign out') }}" onclick="document.getElementById('user-logout-action').submit(); return false;">
                                <i class="fa fa-power-off text-muted"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
