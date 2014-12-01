<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">Laravel Base</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if($user)
                    @if($controller === 'Profile')<li class="active">@else<li>@endif
                        <a href="{{action('UsersController@profile')}}">Profile</a>
                    </li>
                    @if($user->hasRole('Admin'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administration <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-header">User Management</li>
                                @if(User::canList())
                                    @if($controller === 'UsersController')<li class="active">@else<li>@endif
                                        <a href="{{action('UsersController@index')}}">Users</a>
                                    </li>
                                @endif
                                @if(OrganizationUnit::canList())
                                    @if($controller === 'OrganizationUnitsController')<li class="active">@else<li>@endif
                                        <a href="{{action('OrganizationUnitsController@index')}}">Organizations</a>
                                    </li>
                                @endif
                                <li class="divider"></li>
                                <li class="dropdown-header">ACL Management</li>
                                @if(Role::canList())
                                    @if($controller === 'RolesController')<li class="active">@else<li>@endif
                                        <a href="{{action('RolesController@index')}}">Roles</a>
                                    </li>
                                @endif
                                @if(Permission::canList())
                                    @if($controller === 'PermissionsController')<li class="active">@else<li>@endif
                                        <a href="{{action('PermissionsController@index')}}">Permissions</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    <li>
                         <a href="{{action('AuthController@logout')}}">Logout</a>
                    </li>
                @else
                    @if(Route::currentRouteUses('AuthController@login'))<li class="active">@else<li>@endif
                         <a href="{{action('AuthController@login')}}">Login</a>
                    </li>
                    @if(Route::currentRouteUses('AuthController@create'))<li class="active">@else<li>@endif
                         <a href="{{action('AuthController@create')}}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>