@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Detail Pesanan</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Nomor Pesanan
                </label>
                <p class="text-gray-700">{{ $order->order_number }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Produk
                </label>
                <p class="text-gray-700">{{ $order->product->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Jumlah
                </label>
                <p class="text-gray-700">{{ $order->quantity }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Total Harga
                </label>
                <p class="text-gray-700">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('orders.edit', $order) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Edit
                </a>
                <a href="{{ route('orders.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
@endsection
