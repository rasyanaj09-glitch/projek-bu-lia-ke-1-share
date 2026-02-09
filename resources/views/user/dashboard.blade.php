<div class="sidebar">
    <div class="sidebar-header">
        <h3>Dashboard</h3>
        <p>Showing all products</p>
    </div>

    <!-- Menu utama -->
    <ul class="navmenu-menu">
        <li class="navmenu-item"><a href="{{ route('admin.dashboard') }}">Dashboard <i class="bi bi-house"></i></a></li>
        <li class="navmenu-item"><a href="#">My Cart <i class="bi bi-cart"></i></a></li>
        <li class="navmenu-item"><a href="#">Orders <i class="bi bi-bag"></i></a></li>
        <li class="navmenu-item"><a href="#">Browser <i class="bi bi-search"></i></a></li>
    </ul>

    <!-- Daftar produk -->
    <h5 class="mt-4 px-3">Products</h5>
    <ul class="navmenu-menu">
        @foreach($products as $product)
            <li class="navmenu-item">
                <a href="{{ route('products.show', $product->id) }}">
                    {{ $product->title }} <i class="bi bi-box-seam"></i>
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
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <strong>{{ Auth::user()->name }}</strong>
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Logout</button>
                </form>
            </div>
            <h3>Welcome to your dashboard, {{ Auth::user()->name }}!</h3>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
