<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Menampilkan daftar pemasok
    public function index()
    {
        $suppliers = Supplier::all(); // Mengambil semua pemasok
        return view('suppliers.index', compact('suppliers')); // Return view dengan data pemasok
    }

    // Menampilkan form untuk membuat pemasok baru
    public function create()
    {
        return view('suppliers.create'); // Return view untuk form create pemasok
    }

    // Menyimpan pemasok baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        // Simpan pemasok baru
        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully');
    }

    // Menampilkan detail pemasok
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier')); // Return view dengan data pemasok yang dipilih
    }

    // Menampilkan form untuk mengedit pemasok
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier')); // Return view untuk edit pemasok
    }

    // Mengupdate pemasok yang ada
    public function update(Request $request, Supplier $supplier)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        // Update pemasok
        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
    }

    // Menghapus pemasok
    public function destroy(Supplier $supplier)
    {
        $supplier->delete(); // Hapus pemasok

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
    }
}

