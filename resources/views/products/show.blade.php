@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Product Details</h1>
        <a href="{{ route('products.index') }}" class="text-blue-500 hover:text-blue-600">
            &larr; Back to Products
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $product->name }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                SKU: {{ $product->sku }}
            </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Quantity
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->quantity }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Price
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        ${{ number_format($product->price, 2) }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Supplier
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->supplier->name }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-6 flex space-x-3">
        <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
            Edit Product
        </a>
        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this product?')">
                Delete Product
            </button>
        </form>
    </div>
@endsection
