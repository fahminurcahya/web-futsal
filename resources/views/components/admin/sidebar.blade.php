<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Futsal App</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Dasboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.payment.index') }}" class="nav-link {{ request()->is('admin/payment') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Payment Transaction
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.booking.index') }}" class="nav-link {{ request()->is('admin/booking') ? 'active' : '' }}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Bookings
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.field.index') }}" class="nav-link {{ request()->is('admin/field') ? 'active' : '' }}">
                        <i class="nav-icon far fa-futbol"></i>
                        <p>
                            Manage Fields
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.timeslot.index') }}" class="nav-link {{ request()->is('admin/timeslot') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-business-time"></i>
                        <p>
                            Manage Time Slot
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Manage User
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
