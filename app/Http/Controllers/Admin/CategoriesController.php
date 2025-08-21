<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::with('parent', 'children')
            ->withCount('products')
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.pages.categories.index', compact('user', 'categories'));
    }

    public function create()
    {
        $user = Auth::user();
        $parentCategories = Category::active()
            ->roots()
            ->with('children')
            ->orderBy('sort_order')
            ->get();
        return view('admin.pages.categories.create', compact('user', 'parentCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'parent_id' => 'nullable|exists:categories,id',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Categoría creada exitosamente.');
    }
}
