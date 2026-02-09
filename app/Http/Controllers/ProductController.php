<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Mailer\Transport\AbstractApiTransport;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        // UPLOAD IMAGE
        $image = $request->file('image');
        $image->storeAs('products', $image->hashName(), 'public');

        // SIMPAN DATA
        Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
{
    $request->validate([
        'image' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|integer',
        'stock' => 'required|integer',
    ]);

    $product = Product::findOrFail($id);

    // CEK JIKA ADA IMAGE BARU
    if ($request->hasFile('image')) {

        // hapus image lama
        Storage::delete('public/products/'.$product->image);

        // upload image baru
        $image = $request->file('image');
        $image->storeAs('products', $image->hashName(), 'public');

        // update dengan image
        $product->update([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

    } else {

        // update tanpa ubah image
        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
    }

    return redirect()
        ->route('products.index')
        ->with('success', 'Product berhasil ubah!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('products/'.$product->image);
        $product->delete();
        return redirect()
            ->route('products.index')
            ->with('success', 'Product berhasil dihapus!');
    }
}
