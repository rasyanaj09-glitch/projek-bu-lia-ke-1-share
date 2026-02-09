<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
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
                  
                   browser
                </a>
            </li>
              <li class="navmenu-item">
                <a href="#">
                    {{ $product->title }}
                    <i class="bi bi-box-seam"></i>
                  
                    my cart
                </a>
            </li>
              <li class="navmenu-item">
                <a href="#">
                    {{ $product->title }}
                    <i class="bi bi-box-seam"></i>
                  
                    order 
                </a>
            </li>
        @endforeach
    </ul>
</div>
<div class="main-content">
    <div class="top-bar">
        <h2>Product List</h2>
        <div class="user-info"></div>
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
    </div>
</body>
</html>