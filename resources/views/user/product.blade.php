<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h3>Product List</h3>
        <p>Showing all products</p>
    </div>

    <ul class="navmenu-menu">
        @foreach($products as $product)

            <li class="navmenu-item">
                <a href="{{ route('products.show', $product->id) }}">
                    {{ $product->title }}
                    <i class="bi bi-box-seam"></i>
                    Dashboard
                </a>
            </li>

            <li class="navmenu-item">
                <a href="{{ route('user.product.show', $product->id) }}">
                    {{ $product->title }}
                    <i class="bi bi-bagcat"></i>
                    Browser
                </a>
            </li>

            <li class="navmenu-item">
                <a href="#">
                    {{ $product->title }}
                    <i class="bi bi-box-seam"></i>
                    My Cart
                </a>
            </li>

            <li class="navmenu-item">
                <a href="#">
                    {{ $product->title }}
                    <i class="bi bi-box-seam"></i>
                    Order
                </a>
            </li>

        @endforeach
    </ul>
</div>


<div class="main-content">
    <div class="top-bar">

        <h2>Product List</h2>

        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
        </div>

        <div>
            <strong>{{ Auth::user()->name }}</strong>

            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif


        {{-- LIST PRODUCT --}}
        @if ($products->count() > 0)

        <div class="products-grid">

            @foreach ($products as $product)

            <div class="product-card">

                {{-- GAMBAR --}}
                <img src="{{ asset('storage/products/' . $product->image) }}"
                     alt="{{ $product->title }}">

                <div class="product-info">

                    <div class="product-title">
                        <h3>{{ $product->title }}</h3>
                    </div>

                    <div class="product-price">
                        <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                </div>

                <span>
                    <i class="bi bi-box-seam"></i>
                    In Stock: {{ $product->stock }}
                </span>

                <form action="{{ route('user.product.show', $product->id) }}" method="GET">
                    <button type="submit" class="btn add-card">
                        <i class="bi bi-eye"></i> Add to Cart
                    </button>
                </form>

            </div>

            @endforeach

        </div>

        @else

        <div class="empty-state">
            <i class="bi bi-ibox"></i>
            <h3>No Products Available</h3>
        </div>

        @endif

    </div>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
