<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('adminhomepage') }}" class="nav-link {{ Request::routeIs('adminhomepage') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Home</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admintasks') }}" class="nav-link {{ Request::routeIs('admintasks') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tasks"></i>
                <p>Tasks</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('registeredUsersList') }}" class="nav-link {{ Request::routeIs('registeredUsersList') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Users List</p>
            </a>
        </li>
    </ul>
</nav>
