<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background: #f8f9fa;
            padding: 20px 0;
            border-right: 1px solid #ddd;
        }
        .navmenu-menu {
            list-style: none;
            padding-left: 0;
        }
        .navmenu-item a {
            display: flex;
            justify-content: space-between;
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
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #0d6efd;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1rem;
        }
        .empty-cart {
            text-align: center;
            margin-top: 50px;
        }
        .empty-cart i {
            font-size: 4rem;
            color: #ccc;
        }
        .qty-input {
            width: 60px;
        }
        .btn-remove {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
        }
        .btn-remove:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header px-3">
        <h3>Dashboard</h3>
        <p>Showing all products</p>
    </div>

    <ul class="navmenu-menu">
        <li class="navmenu-item">
            <a href="{{ route('user.products') }}">
                Dashboard <i class="bi bi-house"></i>
            </a>
        </li>
        <li class="navmenu-item">
            <a href="#">
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

    <ul class="navmenu-menu px-3">
        @foreach($products as $product)
            <li class="navmenu-item d-flex justify-content-between align-items-center">
                <a href="{{ route('products.show', $product->id) }}">
                    {{ $product->title }}
                    <i class="bi bi-box-seam"></i>
                </a>
                <!-- Add to cart button -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="margin-left:5px;">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

<div class="main-content">
    <h4>Welcome to Cart</h4>

    @if(Auth::check())
        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <strong>{{ Auth::user()->name }}</strong>
            <form action="{{ route('logout') }}" method="POST" style="margin-left:auto;">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-secondary">Logout</button>
            </form>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if($cartItems->count() > 0)
        <div class="container mt-4">
            <h4>Your Cart Items</h4>
            <div class="row">
                @foreach ($cartItems as $item)
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body d-flex align-items-center gap-3">

                                <img src="{{ asset('storage/products/'.$item->product->image) }}"
                                     alt="{{ $item->product->title }}"
                                     class="img-fluid"
                                     style="width:80px; height:80px; object-fit:cover;">

                                <div class="grow">
                                    <h6 class="mb-1">{{ $item->product->title }}</h6>
                                    <p class="mb-1">Price: Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>

                                    <!-- Update quantity -->
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center gap-2 mt-1">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="qty-input">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                                    </form>

                                    <!-- Remove item -->
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="mt-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-remove">
                                            <i class="bi bi-trash"></i> Remove
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="cart-summary mt-4 p-3 bg-light rounded">
                <div class="summary-title h5">Order Summary</div>
                <div class="summary-row d-flex justify-content-between">
                    <span>Subtotal:</span>
                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <a href="{{ route('checkout') }}" class="btn btn-primary w-100 mt-3">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @else
        <div class="empty-cart">
            <i class="bi bi-cart-x"></i>
            <h3>Your cart is empty</h3>
            <p>Add some products to your cart!</p>
            <a href="{{ route('user.products') }}" class="btn-checkout">
                <i class="bi bi-arrow-left"></i> Continue Shopping
            </a>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>