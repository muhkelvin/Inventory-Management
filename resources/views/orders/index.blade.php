@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Pesanan</h1>

        <a href="{{ route('orders.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Buat Pesanan Baru
        </a>

        <table class="w-full bg-white shadow-md rounded mb-4">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Nomor Pesanan</th>
                <th class="py-3 px-6 text-left">Produk</th>
                <th class="py-3 px-6 text-center">Jumlah</th>
                <th class="py-3 px-6 text-center">Total Harga</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            @foreach ($orders as $order)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $order->order_number }}</td>
                    <td class="py-3 px-6 text-left">{{ $order->product->name }}</td>
                    <td class="py-3 px-6 text-center">{{ $order->quantity }}</td>
                    <td class="py-3 px-6 text-center">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('orders.show', $order) }}" class="text-blue-500 hover:underline mr-2">Lihat</a>
                        <a href="{{ route('orders.edit', $order) }}" class="text-yellow-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
