<div class="sidebar">
    <div class="sidebar-header">
        <h3>Admin Panel</h3>
        <p>Management System</p> <!-- watermark developer : pencinta mejiro mcqueen -->

</div>
<ul class="nav-menu">
    <li class="class-item">
        <a href="{{ route('admin.dashboard') }}"class="nav-link{{ request()->routeIs('admin.dashboard')?'active':'' }}">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>
    </li> <!-- watermark developer : pencinta mejiro mcqueen -->

    <li>
        <li class="nav-item">
            <a href="" class="nav-link {{ request()-> routeIs('')?'active':'' }}">
                <i class="bi bi-speedometer2"></i>
                product Management
        </li>
    </li> <!-- watermark developer : pencinta mejiro mcqueen -->

    <li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()-> routeIs('admin.orders.index')?'active':'' }}">
                <i class="bi bi-speedometer2"></i>
                manage order
        </li>
    </li> <!-- watermark developer : pencinta mejiro mcqueen -->

    <li>
        <li class="nav-item">
            <a href="" class="nav-link {{ request()-> routeIs('')?'active':'' }}">
                <i class="bi bi-speedometer2"></i>
                sales report
        </li>
    </li>
</ul> <!-- watermark developer : pencinta mejiro mcqueen -->
