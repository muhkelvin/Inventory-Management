@extends('layouts.app')

@section('title', 'Detail Pemasok')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Detail Pemasok</h1>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
            <p class="text-gray-700">{{ $supplier->name }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <p class="text-gray-700">{{ $supplier->email }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Telepon:</label>
            <p class="text-gray-700">{{ $supplier->phone }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
            <p class="text-gray-700">{{ $supplier->address }}</p>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('suppliers.edit', $supplier) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Edit
            </a>
            <a href="{{ route('suppliers.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Kembali ke Daftar
            </a>
        </div>
    </div>
@endsection
