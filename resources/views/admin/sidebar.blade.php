s="sidebar-menu">
    <li class="sidebar-menu-item">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-menu-link">
            <i class="sidebar-menu-icon fas fa-tachometer-alt"></i>
            <span class="sidebar-menu-text">Dashboard</span>
        </a>
    </li>
    <li class="sidebar-menu-item">
        <a href="{{ route('admin.orders.index') }}" class="sidebar-menu-link">
            <i class="sidebar-menu-icon fas fa-shopping-cart"></i>
            <span class="sidebar-menu-text">Orders</span>
        </a>
    </li>
    <li class="sidebar-menu-item">
        <a href="{{ route('admin.sales') }}" class="sidebar-menu-link">
            <i class="sidebar-menu-icon fas fa-chart-line"></i>
            <span class="sidebar-menu-text">Sales Report</span>
        </a>
    </li>