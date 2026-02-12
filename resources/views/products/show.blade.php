<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW PRODUCT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS INTERNAL -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .product-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 20px;
        }

        .product-image {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .product-image:hover {
            transform: scale(1.03);
        }

        .product-title {
            font-weight: bold;
            color: #2c3e50;
        }

        .price {
            color: #198754;
            font-weight: bold;
        }

        .stock {
            font-weight: 500;
            color: #0d6efd;
        }

        .description-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<!-- watermark developer : pencinta mejiro mcqueen -->

<div class="container mt-5 mb-5">
    <div class="row g-4">

        <!-- IMAGE -->
        <div class="col-md-4">
            <div class="product-card text-center">
                <img 
                    src="{{ asset('storage/products/'.$product->image) }}" 
                    class="img-fluid product-image"
                >
            </div>
        </div>

        <!-- DETAIL -->
        <div class="col-md-8">
            <div class="product-card">

                <h3 class="text-center mb-4 product-title">
                    {{ $product->title }}
                </h3>

                <hr>

                <div class="description-box mb-3">
                    {!! $product->description !!}
                </div>

                <h4 class="price">
                    Price : Rp. {{ number_format($product->price, 0, ',', '.') }}
                </h4>

                <h5 class="stock mt-3">
                    Stock : {{ $product->stock }}
                </h5>

            </div>
        </div>

    </div>
</div>

</body>
</html>
    <!-- watermark developer : pencinta mejiro mcqueen -->