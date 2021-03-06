<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{\Auth::User()->vpf->avatar}}" class="user-image" alt="User Image" />
                    <span class="hidden-xs">{{\Auth::User()->vpf}}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{\Auth::User()->vpf->avatar}}" class="img-circle" alt="User Image" />
                        <p>
                            {{\Auth::User()->vpf}}
                            <small>{{\Auth::User()->vpf->assignment->mos->name}}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="/" class="btn btn-default btn-flat">Back to Frontend</a>
                        </div>
                        <div class="pull-right">
                            <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>