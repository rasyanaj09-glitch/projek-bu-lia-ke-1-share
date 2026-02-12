<div class="sidebar">

    <div class="sidebar-header">
        <h3>Admin Panel</h3>
        <p>Management System</p> <!-- watermark developer : pencinta mejiro mcqueen -->
    </div>

    <ul class="nav-menu">


        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li> <!-- watermark developer : pencinta mejiro mcqueen -->



        <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link">
                <i class="bi bi-box-seam"></i>
                Product Management
            </a>
        </li> <!-- watermark developer : pencinta mejiro mcqueen -->



        <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link">
                <i class="bi bi-receipt"></i>
                Manage Orders
            </a>
        </li> <!-- watermark developer : pencinta mejiro mcqueen -->


    
        <li class="nav-item">
            <a href="{{ route('admin.sales') }}" class="nav-link">
                <i class="bi bi-graph-up"></i>
                Sales Report
            </a>
        </li>

    </ul> <!-- watermark developer : pencinta mejiro mcqueen -->

</div>
