<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk
        return view('products.index', compact('products')); // Return view dengan data produk
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $suppliers = Supplier::all(); // Mengambil semua pemasok
        return view('products.create',compact('suppliers')); // Return view untuk form create produk
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        // Simpan produk baru
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    // Menampilkan detail produk
    public function show(Product $product)
    {
        return view('products.show', compact('product')); // Return view dengan data produk yang dipilih
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        $suppliers = Supplier::all(); // Mengambil semua suppliers
        return view('products.edit', compact('product', 'suppliers')); // Return view dengan data produk dan suppliers
    }


    // Mengupdate produk yang ada
    public function update(Request $request, Product $product)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        // Update produk
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete(); // Hapus produk

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
