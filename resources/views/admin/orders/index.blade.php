<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Orders</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Badge Status */
        .badge-status-pending {
            background: orange;
        }

        .badge-status-processing {
            background: blue;
        }

        .badge-status-completed {
            background: green;
        }

        .badge-status-cancelled {
            background: red;
        }

        /* Badge Payment */
        .badge-payment-pending {
            background: orange;
        }

        .badge-payment-paid {
            background: green;
        }

        .badge-payment-failed {
            background: red;
        }

        span[class^="badge-"] {
            color: #fff;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="card shadow-sm">


            <div class="card-header">
                <h5 class="mb-0">List Orders</h5>
            </div>


            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">

                        <thead class="table-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>

                                    <td>
                                        {{ $order->created_at->format('d M Y') }}
                                    </td>

                                    <td>{{ $order->customer_name }}</td>

                                    <td>
                                        Rp {{ number_format($order->total_amount, 2, ',', '.') }}
                                    </td>

                                    <td class="text-uppercase">
                                        {{ str_replace('_', ' ', $order->payment_method) }}
                                    </td>


                                    <td>
                                        <span class="badge-status-{{ $order->status }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge-payment-{{ $order->payment_status }}">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>


                                    <td>
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="bi bi-eye"></i> View & Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="mt-3">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>

</body>

</html>
