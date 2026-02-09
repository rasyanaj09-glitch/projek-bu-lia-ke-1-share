<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDIT Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3 class="text-center my-4">EDIT PRODUCT</h3>
    <hr>


    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- TITLE -->
    <div class="form-group mb-3">
        <label class="font-weight-bold">Title</label>
        <input type="text"
               class="form-control @error('title') is-invalid @enderror"
               name="title"
               placeholder="Enter product title"
               value="{{ old('title', $product->title) }}">

        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- DESCRIPTION -->
    <div class="form-group mb-3">
        <label class="font-weight-bold">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror"
                  name="description"
                  placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>

        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- IMAGE -->
    <div class="form-group mb-3">
        <label class="font-weight-bold">Image</label>
        <input type="file"
               class="form-control @error('image') is-invalid @enderror"
               name="image">

        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- PRICE -->
    <div class="form-group mb-3">
        <label class="font-weight-bold">Price</label>
        <input type="number"
               class="form-control @error('price') is-invalid @enderror"
               name="price"
               placeholder="Enter product price"
               value="{{ old('price', $product->price) }}">

        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- STOCK -->
    <div class="form-group mb-3">
        <label class="font-weight-bold">Stock</label>
        <input type="number"
               class="form-control @error('stock') is-invalid @enderror"
               name="stock"
               placeholder="Enter product stock"
               value="{{ old('stock', $product->stock) }}">

        @error('stock')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">UPDATE</button>
    <button type="reset" class="btn btn-warning">RESET</button>
</form>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('desc');
</script>

</body>
</html>
