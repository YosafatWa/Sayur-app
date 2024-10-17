<?php

namespace App\Http\Controllers;

use App\Models\Vegetable;
use Illuminate\Http\Request;

class VegetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Method untuk menampilkan daftar sayur (halaman home)
    public function index()
    {
        $vegetables = Vegetable::simplePaginate(5);
        return view('vegetable.index', compact('vegetables')); // Mengarahkan ke view dan mengirim data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vegetable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // Simpan data ke database
        Vegetable::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Redirect setelah berhasil menyimpan
        return redirect()->route('vegetable.index')->with('success', 'Data sayur berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vegetable $vegetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vegetable = Vegetable::findOrFail($id);
        return view('vegetable.edit', compact('vegetable')); // Mengarahkan ke view edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vegetable = Vegetable::findOrFail($id);
        
        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // Update data
        $vegetable->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('vegetable.index')->with('success', 'Data sayur berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vegetable = Vegetable::findOrFail($id);
        $vegetable->delete();

        return redirect()->route('vegetable.index')->with('success', 'Sayur berhasil dihapus!');
    }
}
