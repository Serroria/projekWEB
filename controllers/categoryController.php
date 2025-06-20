<?php
// app/Http/Controllers/CategoryController.php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('categories');
            $validatedData['gambar'] = $gambar;
        }

        Category::create($validatedData);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan');
    }
}

?>