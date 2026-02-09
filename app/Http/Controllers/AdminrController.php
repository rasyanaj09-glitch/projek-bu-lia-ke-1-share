<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()                           
    {
        $productCount=Product ::count();
        $orderCount=Order ::count(); 
        $revenue=Order::where('status', '!=', 'cancelled')->sum('total_amount');

        return view('admin.dashboard', compact('productCount', 'orderCount', 'revenue'));
    }

    /**
     *  <!-- watermark developer : pencinta mejiro mcqueen -->

     */
    public function salesreport(Request $request)
    {
        $query = Order::query();
        $period = $request->get('period', 'all');
        $date=$request->get('date',now()->format('Y-m-d'));

        switch ($period) {
            case 'daily':
                $query->whereDate('created_at', $date);
                $title = 'Daily Sales Report for ' . \Carbon\Carbon::parse($date)->format('y m, d');
                break;
                case 'weekly':
                    $startOfWeek = \Carbon\Carbon::parse($date)->startOfWeek();
                    $endOfWeek = \Carbon\Carbon::parse($date)->endOfWeek();
                    $query->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
                    $title = 'Weekly Sales Report for ' . $startOfWeek->format('y m, d') . ' - ' . $endOfWeek->format('y m, d');
                break;

            case 'monthly':
                $query->whereMonth('created_at', \Carbon\Carbon::parse($date)->month)
                      ->whereYear('created_at', \Carbon\Carbon::parse($date)->year);
                      $title = 'Monthly Sales Report for ' . \Carbon\Carbon::parse($date)->format('F Y');
                break;
            default:
                $title = 'All Time Sales Report';
                break;
        }
        $orders = $query->orderBy('created_at', 'desc')->get();
        $totalorders = $orders->count();
        $totalrevenue = $orders->where('status', '!=', 'cancelled')->sum('total_amount');
        $successfulorders = $orders->where('status', '!=', 'cancelled')->count();

        return view('admin.index.blade', compact('orders', 'period', 'date', 'title', 'totalorders', 'totalrevenue', 'successfulorders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    /**
     *  <!-- watermark developer : pencinta mejiro mcqueen -->

     */

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

  
    /**
     *  <!-- watermark developer : pencinta mejiro mcqueen -->

     */

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     *  <!-- watermark developer : pencinta mejiro mcqueen -->

     */

    public function destroy(string $id)
    {
        //
    }
}
