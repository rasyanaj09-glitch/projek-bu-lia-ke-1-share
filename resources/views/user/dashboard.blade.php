<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #f8f9fa;
            padding: 20px 0;
            border-right: 1px solid #ddd;
        }
        .sidebar-header {
            padding: 0 20px;
            margin-bottom: 20px;
        }
        .navmenu-menu {
            list-style: none;
            padding-left: 0;
        }
        .navmenu-item a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
        }
        .navmenu-item a:hover {
            background: #e9ecef;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .top-bar {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #0d6efd;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h3>Dashboard</h3>
        <p>Showing all products</p>
    </div>

    <ul class="navmenu-menu">
        <li class="navmenu-item">
            <a href="{{ route('user.dashboard') }}">
                Dashboard <i class="bi bi-house"></i>
            </a>
        </li>

        <li class="navmenu-item">
            <a href="{{ route('cart.index') }}">
                My Cart <i class="bi bi-cart"></i>
            </a>
        </li>

        <li class="navmenu-item">
            <a href="#">
                Orders <i class="bi bi-bag"></i>
            </a>
        </li>

        <li class="navmenu-item">
            <a href="#">
                Browser <i class="bi bi-search"></i>
            </a>
        </li>
    </ul>

    <h5 class="mt-4 px-3">Products</h5>

    <ul class="navmenu-menu">
        @foreach($products as $product)
            <li class="navmenu-item">
                <a href="{{ route('products.show', $product->id) }}">
                    {{ $product->title }}
                    <i class="bi bi-box-seam"></i>
                </a>
            </li>
        @endforeach
    </ul>
</div>

<div class="main-content">
    <div class="top-bar">
        <h2>Product List</h2>

        @if(Auth::check())
            <div class="user-info">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <strong>{{ Auth::user()->name }}</strong>

                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                        Logout
                    </button>
                </form>
            </div>

            <h3>
                Welcome to your dashboard, {{ Auth::user()->name }}!
            </h3>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Products grid -->
    <div class="row mt-3">
        @foreach($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <img src="{{ asset('storage/products/'.$product->image) }}" 
                         class="card-img-top" 
                         alt="{{ $product->title }}" 
                         style="height:200px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">
                            View
                        </a>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-outline-primary btn-sm">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

   
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>