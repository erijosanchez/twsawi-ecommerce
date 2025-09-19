<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;

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

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        
        // Generar slug automáticamente si no se proporciona
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Manejar subida de imagen
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        // Determinar sort_order
        if (!isset($data['sort_order'])) {
            $data['sort_order'] = Category::max('sort_order') + 1;
        }

        $category = Category::create($data);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Categoría creada exitosamente.');
    }
}
