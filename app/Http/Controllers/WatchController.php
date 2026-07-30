<?php

namespace App\Http\Controllers;
use App\Models\Watch;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class WatchController extends Controller
{

public function home()
{
    $watches = Watch::latest()->take(6)->get();
    return view('welcome', compact('watches'));
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $watches = Watch::all();
        return view('watches.index', compact('watches'));
    }
    /**
     * Show the form for creating a new resource.
     */
  public function create()
    {
        return view('watches.create');
    }

public function store(Request $request)
{
    $request->validate([
        'model' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
        'image' => 'required|image',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('watches', 'public');
    }

    Watch::create($data);

    return redirect()->route('watches.index')
        ->with('success', 'Watch added successfully!');
}

    /**
     * Display the specified resource.
     */
public function show(Watch $watch)
{
    return view('watches.show', compact('watch'));
}

   public function edit(Watch $watch)
{
    return view('watches.edit', compact('watch'));
}

public function update(Request $request, Watch $watch)
{
    $request->validate([
        'model' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('watches', 'public');
    }

    $watch->update($data);

    return redirect()->route('watches.index')
        ->with('success', 'Watch updated successfully!');
}

public function destroy(Watch $watch)
{
    $watch->delete();

    return redirect()->route('watches.index')
        ->with('success', 'Watch deleted successfully!');
}


public function categories()
{
    $categories = Category::all();
    return view('categories', compact('categories'));
}
}
