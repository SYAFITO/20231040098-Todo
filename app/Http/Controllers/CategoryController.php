<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index()
    {
        Gate::authorize('admin-only');
        $categories = Category::withCount('products')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        Gate::authorize('admin-only');
        return view('category.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('admin-only');
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
        Category::create($validated);
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        Gate::authorize('admin-only');
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        Gate::authorize('admin-only');
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);
        $category->update($validated);
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function delete(Category $category)
    {
        Gate::authorize('admin-only');
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}