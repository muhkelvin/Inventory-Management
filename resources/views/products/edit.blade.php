@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                       class="mt-1 p-2 w-full border rounded @error('name') border-red-500 @enderror">
            </div>

            <div class="mb-4">
                <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}"
                       class="mt-1 p-2 w-full border rounded @error('sku') border-red-500 @enderror">
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}"
                       class="mt-1 p-2 w-full border rounded @error('quantity') border-red-500 @enderror">
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}"
                       class="mt-1 p-2 w-full border rounded @error('price') border-red-500 @enderror">
            </div>

            <div class="mb-4">
                <label for="supplier_id" class="block text-sm font-medium text-gray-700">Supplier</label>
                <select name="supplier_id" id="supplier_id"
                        class="mt-1 p-2 w-full border rounded @error('supplier_id') border-red-500 @enderror">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded mr-2">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update Product</button>
            </div>
        </form>
    </div>
@endsection
