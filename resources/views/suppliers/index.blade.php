@extends('layouts.app')

@section('title', 'Daftar Pemasok')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Pemasok</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <a href="{{ route('suppliers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Tambah Pemasok Baru
    </a>

    <table class="min-w-full bg-white">
        <thead>
        <tr>
            <th class="py-2 px-4 border-b">Nama</th>
            <th class="py-2 px-4 border-b">Email</th>
            <th class="py-2 px-4 border-b">Telepon</th>
            <th class="py-2 px-4 border-b">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($suppliers as $supplier)
            <tr>
                <td class="py-2 px-4 border-b">{{ $supplier->name }}</td>
                <td class="py-2 px-4 border-b">{{ $supplier->email }}</td>
                <td class="py-2 px-4 border-b">{{ $supplier->phone }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-blue-500 hover:underline mr-2">Lihat</a>
                    <a href="{{ route('suppliers.edit', $supplier) }}" class="text-yellow-500 hover:underline mr-2">Edit</a>
                    <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus pemasok ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
