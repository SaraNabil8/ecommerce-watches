<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
        
    }


    /**
     * Show the form for creating a new resource.
     */
  public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:500',
       
    ]);

    $data = $request->all();

  
    category::create($data);

    return redirect()->route('categories.index')
        ->with('success', 'Category added successfully!');
}

    /**
     * Display the specified resource.
     */
public function show(Category $category)
{
    $watches = $category->watches;
    return view('categories.show', compact('category', 'watches'));
}


    /**
     * Show the form for editing the specified resource.
     */   
  public function edit(Category $category)
{
     $categories = Category::all();
    return view('categories.edit', compact('category'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
{
    $request->validate([
        'name' => 'required|string|max:500',
    
    ]);

    $data = $request->all();


    $category->update($data);

    return redirect()->route('categories.index')
        ->with('success', 'Category updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(category $category)
{
    $category->delete();

    return redirect()->route('categories.index')
        ->with('success', 'Category deleted successfully!');
}

public function categories()
{
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}
}
