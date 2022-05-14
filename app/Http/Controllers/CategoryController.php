<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        Category::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
        ]);

        return back()->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }
}
