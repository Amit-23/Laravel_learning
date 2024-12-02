<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('userhome') }}" class="nav-link {{ Request::routeIs('userhome') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Home</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('userdashboard') }}" class="nav-link {{ Request::routeIs('userdashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tasks"></i>
                <p>Tasks</p>
            </a>
        </li>
    </ul>
</nav>
