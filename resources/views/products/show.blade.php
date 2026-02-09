<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHOW PRODUCT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
     <!-- watermark developer : pencinta mejiro mcqueen -->

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card-border-0 shadow-sm rounded"></div>
                    <img src="{{ asset('storage/products/'.$product->image) }}" style="width:100%" class="rounded">


                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-border-0 shadow-sm rounded p-3">
            <h3 class="text-center mb-4">{{ $product->title }}</h3>
            <hr>
            <p class="text-justify">{{ $product->description }}</p>
            <h4 class="mt-3">Price : Rp. {{ number_format($product->price, 0, ',', '.') }}</h4>
            <code>
                <p>
                    {!! $product->description !!}
                </p>
                <hr/>

            </code>
            <h4 class="mt-3">Stock : {{ $product->stock }}</h4>
            </div>
    </div>
</body>
</html>