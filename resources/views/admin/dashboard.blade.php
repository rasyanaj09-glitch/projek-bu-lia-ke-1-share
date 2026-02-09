<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style> <!-- watermark developer : pencinta mejiro mcqueen -->


    </style>
</head>


<body>
    @include('admin.sidebar')
    <div class="main-content">
        <div class="top-bar">
            <h2>Dashboard</h2>
            <div class="user-info">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
            <strong>{{ Auth::user()->name }}</strong>
            <form action="{{ route('logout') }}" method="POST" style="display: inline">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="bi bi-box-seam"></i>
                <h3></h3>
                <p>Total Products</p>
            </div>
        </div> 

    </div>
     <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="bi bi-box-seam"></i>
                <h3></h3>
                <p>Total Orders</p>
            </div>
        </div>
    </div> 

     <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="bi bi-box-seam"></i>
                <h3></h3>
                <p>Total Revenue</p> 

            </div>
        </div>
    </div> 

    <div class="quck-actions">
        <h5>Quick Actions</h5>
        <a href="{{ route('products.index') }}" class="action-button">
            <i class="bi bi-box-seam"></i>Manage Products
        </a>
        <a href="{{ route('products.create') }}" class="action-button">
            <i class="bi bi-box-circle"></i>Manage Products
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body> <!-- watermark developer : pencinta mejiro mcqueen -->


</html>