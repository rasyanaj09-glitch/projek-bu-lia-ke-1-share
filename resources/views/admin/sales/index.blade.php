<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="main-content">>
        <div class="page-content">
            <div class="container-fluid">
                <h1>HALAMAN SALES</h1>
                <button onclick="window.print()" class="btn btn-primary"><i class="bi bi-printer"></i> Print</button>
            </div>
            <div class="container mt-4">
                <div class="card-body">
                    <form action=" method="GET">
                        <div class="col-md-3">
                            <label class="form-label">periode</label>
                            <select name="periode" class="form-select" onchange="this.form.submit()">
                                <option value="">All Periods</option>
                                <option value="all" {{ $period == 'all' ? 'selected' : '' }}>All Time</option>
                                <option value="daily" {{ $period == 'daily' ? 'selected' : '' }}>daily</option>
                                <option value="weekly" {{ $period == 'weekly' ? 'selected' : '' }}>weekly</option>
                                <option value="monthly" {{ $period == 'monthly' ? 'selected' : '' }}>monthly</option>
                            </select>
                        </div>

                    </form>
                    @if ($period != 'all')
                        <div class="col-md-3">
                            <label class="form-label">select data</label>
                            <input type="date" name="date" class="form-control" value="{{ $data ?? '' }}"
                                onchange="this.form.submit()">
                    @endif
                    < </div>
                </div>
                <h4 class="mt-4">{{ $title }}</h4>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Revenue</h5>
                                <div class="stat-value text-success">Rp
                                    {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">order</h5>
                                <div class="stat-value text-success">Rp
                                    {{ number_format($totalOrders) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Successful Orders</h5>
                                <div class="stat-value text-success">{{ number_format($successfulOrders) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card"></div>
                <div class="card-body"></div>

                <h4 class="card-title mb-4">Sales Data</h4>
                <div class="card-body"></div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td style="font-family: monospace;">{{ $order->order_id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge-status-status {{ $order->status }}">
                                        {{ ucfirst($order->status) }}
                                </td>
                                <td class="text-uppercase">{{ str_replace('_', ' ', $order->payment_method) }}</td>
                            </tr>
                        @empty
                            <tr></tr>
                            <td colspan="6" class="text-center">
                                <i class="bi bi-fs-1 text-muted"></i>
                                <p class="text-muted mt-2">No orders available for the selected period.</p>
                        @endforelse
                </table>


            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


</body>

</html>
