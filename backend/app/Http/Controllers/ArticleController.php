<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Menampilkan semua artikel
    public function index()
    {
        $articles = Article::all();  // Mendapatkan semua data artikel
        return view('articles.index', compact('articles'));  // Mengirim data ke view
    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validated = $request->validate([
            'title' => 'required|string|max:255', // Validasi judul
            'content' => 'required|string', // Validasi konten artikel
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validasi gambar (opsional)
        ]);

        // Menyimpan gambar jika ada
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Menyimpan gambar di folder 'public/photos'
            $validated['photo'] = $photoPath; // Menyimpan path gambar ke dalam array validated
        }

        // Membuat artikel baru menggunakan data yang sudah tervalidasi
        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }
    public function create()
    {
        return view('articles.create');  // Menampilkan halaman create.blade.php
    }
    // Menampilkan artikel berdasarkan ID
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Mengedit artikel yang sudah ada
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Memperbarui artikel yang sudah ada
    public function update(Request $request, Article $article)
    {
        // Validasi data yang diterima dari request
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255', // Validasi judul, bisa kosong jika tidak ada perubahan
            'content' => 'sometimes|required|string', // Validasi konten artikel, bisa kosong jika tidak ada perubahan
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validasi gambar (opsional)
        ]);

        // Jika ada gambar yang di-upload, simpan gambar tersebut dan update path-nya
        if ($request->hasFile('photo')) {
            // Hapus gambar lama jika ada
            if ($article->photo) {  // Gantilah 'image' menjadi 'photo'
                Storage::delete('public/' . $article->photo);
            }

            // Simpan gambar baru
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }

        // Memperbarui artikel dengan data yang sudah tervalidasi
        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    // Menghapus artikel dari database
    public function destroy(Article $article)
    {
        // Hapus gambar yang terkait jika ada
        if ($article->photo) {  // Gantilah 'image' menjadi 'photo'
            Storage::delete('public/' . $article->photo);
        }

        // Menghapus artikel dari database
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');  // Redirect ke halaman index dengan pesan sukses
    }
}
