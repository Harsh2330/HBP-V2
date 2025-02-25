<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if(Auth::user()->usertype === 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.patient.index') }}" class="nav-link {{ request()->routeIs('admin.patient.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>Patient Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('medical_visit.create') }}" class="nav-link {{ request()->routeIs('medical_visit.create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Create Medical Visit</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('medical_visit.index') }}" class="nav-link {{ request()->routeIs('medical_visit.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-notes-medical"></i>
                        <p>Medical Visits</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <!-- Add more links as needed -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
