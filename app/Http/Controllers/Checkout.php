<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Checkout extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())
        ->with('product')
        ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
        $total = $cartItems->sum(function ($item) {
             return $item->product->price * $item->quantity;
         });

         return view('user.checkout', compact('cartItems', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
      public function prosesCheckout(Request $request)
    {
    
      

      $request->validate([
             'shipping_address' => 'required|string',
             'shipping_phone' => 'required|string',
             'payment_method' => 'required|in:credit_card,bank_transfer',
             'payment_status' => 'required|in:pending,completed'
        ]);
         $cartItems = Cart::where('user_id', Auth::id())
        ->with('product')
        ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
           $total = $cartItems->sum(function ($item) {
             return $item->product->price * $item->quantity;
         });
         DB::beginTransaction();
         try {
             $order = Order_item::create([
                 'user_id' => Auth::id(),
                 'order_number' => 'ORD-' . time().'-'.Auth::id(),
                 'total_amount' => $total,
                 'status' => 'pending',
                 'shipping_address' => $request->shipping_address,
                 'shipping_phone' => $request->shipping_phone,
                 'payment_method' => $request->payment_method,
                 'payment_status' => $request->payment_status
             ]);

             foreach ($cartItems as $item) {
                 $order->items()->create([
                    'order_id' => $order->id,
                     'product_id' => $item->product_id,
                     'quantity' => $item->quantity,
                     'price' => $item->product->price
                 ]);
                 $product = $item->product;
                 $product->stock -= $item->quantity;
                 $product->save();
             }  
                Cart::where('user_id', Auth::id())->delete();
                DB::commit();
                return redirect()->route('checkout.confirmation')->with('success', 'Checkout successful! Your order number is ' . $order->order_number);

         }
            catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('cart.index')->with('error', 'Checkout failed: ' . $e->getMessage());
            }
            
    }    
    /**
     * Store a newly created resource in storage.
     */
    public function confirmation(Request $orderif)
    {
        $order = Order_item::where('order_number', $orderif->order_number)->firstOrFail();
        return view('user.confirmation', compact('order'));
    }

    /**
     * Display the specified resource.
     */
    public function details(string $orderid)
    {
        $order = Order_item::where('order_number', $orderid)->firstOrFail();
        return view('user.order_details', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
