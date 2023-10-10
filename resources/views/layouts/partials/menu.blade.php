@canany(['view_post'])
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="./index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
            </a>
        </li>
    </ul>
</li>
@endcanany

@canany(['add_role', 'edit_role', 'view_role','delete_role'])
<li class="nav-item {{ request()->routeIs('roles.index') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Roles
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles List</p>
            </a>
        </li>
    </ul>
</li>
@endcanany

@canany(['add_permission', 'edit_permission', 'view_permission','delete_permission'])
<li class="nav-item {{ request()->routeIs('permissions.index') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Permissions
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('permissions.index') }}"
                class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Permissions List</p>
            </a>
        </li>
    </ul>
</li>
@endcanany

@canany(['add_user', 'edit_user','view_user','delete_user'])
<li class="nav-item {{ request()->routeIs('user.index') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            User
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>User List</p>
            </a>
        </li>
    </ul>
</li>
@endcanany

@canany(['add_post', 'edit_post', 'view_post','delete_post'])
<li class="nav-item {{ request()->routeIs('posts.index') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Post
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('posts.index') }}"
                class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Post List</p>
            </a>
        </li>
    </ul>
</li>
@endcanany
