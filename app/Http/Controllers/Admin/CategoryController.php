<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $exists = Category::where('name', $request->name)->first();

        if (!$exists) {
            $data = $request->all();
            $data['slug'] = Helper::generateSlug($data['name'], Category::class);
            $category = Category::create($data);
            return redirect()->route('admin.categories.index')->with('success', 'Categoria aggiunta correttamente');
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'Categoria già presente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['name'], Category::class);
        $category->update($data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('delete', 'Elemento ' . $category->name . ' è stato eliminato');
    }

    public function CategoryJobs()
    {

        $categories = Category::all();

        return view('admin.categories.categoryJobs', compact('categories'));
    }
}
