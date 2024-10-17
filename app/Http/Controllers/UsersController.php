<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Mengambil semua pengguna dari database
        return view('users.index', compact('users')); // Mengarahkan ke view dengan mengirimkan data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create'); // Mengarahkan ke view untuk menambah akun baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:admin,kasir,pengguna',
            'password' => 'required|string|min:8',
        ]);

        // Menyimpan data pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password), // Hashing password sebelum disimpan
        ]);

        return redirect()->route('users.index')->with('success', 'Akun berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID
        return view('users.edit', compact('user')); // Mengarahkan ke view edit dengan mengirimkan data pengguna
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID

        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,kasir,pengguna',
            'password' => 'nullable|string|min:8', // Password bersifat opsional
        ]);

        // Memperbarui data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Hashing password sebelum disimpan
        }

        $user->save(); // Menyimpan perubahan

        return redirect()->route('users.index')->with('success', 'Akun berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID
        $user->delete(); // Menghapus pengguna

        return redirect()->route('users.index')->with('success', 'Akun berhasil dihapus!');
    }
}
