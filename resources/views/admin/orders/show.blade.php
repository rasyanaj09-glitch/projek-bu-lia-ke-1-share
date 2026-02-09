<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Order Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">

        <!-- Header -->
        <div class="d-flex align-items-center mb-4 gap-3">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Orders
            </a>
            <h2 class="mb-0">Order Details - {{ $order->order_number }}</h2>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Customer Information</h4>

                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Product</th>
                                    <th width="120">Quantity</th>
                                    <th width="150">Price</th>
                                    <th width="150">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('storage/products/' . $item->product->image) }}"
                                                    width="50" class="rounded" alt="">
                                                <span>{{ $item->product->title }}</span>
                                            </div>
                                        </td>

                                        <td>{{ $item->quantity }}</td>

                                        <td>
                                            Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </td>

                                        <td>
                                            Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-end">
                                        <strong>Total Amount:</strong>
                                    </td>
                                    <td>
                                        <strong>
                                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
<div class="card">
                    <div class="card-header">

                        <h4 class="mb-0">shipping Information</h4>
                        </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small">Shipping Address</label>
                                <div class="fw-bold"{{ $order->shipping_address }}></div>
                                   
                        </div>
                        </div>
                         <div class="col-md-6 mb-3">
                                <label class="text-muted small">phone number</label>
                                <div class="fw-bold"></div>{{ $order->phone_number }}</div>
                                   
                        </div>
                        </div>
                         <div class="col-md-6 mb-3">
                                <label class="text-muted small"><address></address></label>
                                <div class="fw-bold"{{ $order->shipping_address }}></div>
                                   
                        </div>
                        </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                 <h5 class="mb-0">Update Order Status</h5>


                </div>
                <div class="card-body">
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="status" class="form-label">Order Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                    Processing</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                    Completed</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                    Cancelled</option>
                            </select>
                        </div>
                    

                       <div class="mb-3">
                            <label for="payment_status" class="form-label">Payment Status</label>
                            <select name="payment_status" id="payment_status" class="form-select" required>
                                <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid
                                </option>
                                <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>
                                    Failed</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Update Status</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
