<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan daftar pesanan
    public function index()
    {
        $orders = Order::all(); // Mengambil semua pesanan
        return view('orders.index', compact('orders')); // Return view dengan data pesanan
    }

    // Menampilkan form untuk membuat pesanan baru
    public function create()
    {
        $products = Product::all(); // Ambil semua produk untuk dipilih dalam pesanan
        return view('orders.create', compact('products')); // Return view untuk form create pesanan
    }

    // Menyimpan pesanan baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'order_number' => 'required|string|max:100|unique:orders',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
        ]);

        // Simpan pesanan baru
        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    // Menampilkan detail pesanan
    public function show(Order $order)
    {
        return view('orders.show', compact('order')); // Return view dengan data pesanan yang dipilih
    }

    // Menampilkan form untuk mengedit pesanan
    public function edit(Order $order)
    {
        $products = Product::all(); // Ambil semua produk untuk dipilih dalam pesanan
        return view('orders.edit', compact('order', 'products')); // Return view untuk edit pesanan
    }

    // Mengupdate pesanan yang ada
    public function update(Request $request, Order $order)
    {
        // Validasi input
        $validated = $request->validate([
            'order_number' => 'required|string|max:100|unique:orders,order_number,' . $order->id,
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
        ]);

        // Update pesanan
        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    // Menghapus pesanan
    public function destroy(Order $order)
    {
        $order->delete(); // Hapus pesanan

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}

