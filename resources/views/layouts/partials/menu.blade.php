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
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
      Roles
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('roles.index') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Roles List</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Permissions
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('permissions.index') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Permissions List</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        User
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('user.index') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>User List</p>
        </a>
      </li>
    </ul>
  </li>