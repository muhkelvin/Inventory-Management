@extends('layouts.app')

@section('title', 'Products List')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Products</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Add New Product
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
            <thead>
            <tr class="text-left">
                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">Name</th>
                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">SKU</th>
                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">Quantity</th>
                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">Price</th>
                <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="border-dashed border-t border-gray-200 px-6 py-4">{{ $product->name }}</td>
                    <td class="border-dashed border-t border-gray-200 px-6 py-4">{{ $product->sku }}</td>
                    <td class="border-dashed border-t border-gray-200 px-6 py-4">{{ $product->quantity }}</td>
                    <td class="border-dashed border-t border-gray-200 px-6 py-4">${{ number_format($product->price, 2) }}</td>
                    <td class="border-dashed border-t border-gray-200 px-6 py-4">
                        <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:text-blue-900 mr-2">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="text-green-600 hover:text-green-900 mr-2">Edit</a>

                        <!-- Form Delete -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
