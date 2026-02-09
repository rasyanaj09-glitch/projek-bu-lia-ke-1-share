<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }

   
    /**
     *  <!-- watermark developer : pencinta mejiro mcqueen -->

     */
    public function product()
    {
      
   $product=Product::paginate(10);
        return view('user.products.index', compact('product'));

    }

   
    /**
     *  <!-- watermark developer : pencinta mejiro mcqueen -->

     */

    public function store(Request $request)
    {
        //
    }

   
    /**
     *  <!-- watermark developer : pencinta mejiro mcqueen -->

     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    
    /**
     *  <!-- watermark developer : pencinta mejiro mcqueen -->

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
