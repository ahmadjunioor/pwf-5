<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        // withCount('products') akan menghitung total produk di tiap kategori
        $categories = Category::withCount('products')->get();
        return view('category.index', compact('categories'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('category.create');
    }

    // Menyimpan data kategori baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    // Menampilkan form edit kategori (Opsional/Tambahan)
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    // Mengupdate data kategori
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    // Menghapus data kategori
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}