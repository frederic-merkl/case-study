<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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

        return view('categories.index', ['categories' => $categories]);
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
    public function store(StoreCategoryRequest $storeCategoryRequest)
    {
        $validated = $storeCategoryRequest->validated(); // validated() return the data that was validated in the request class

        $category = Category::create($validated); // creates a model with validated data
        // return a redirect header/status code to show route with implicit model binding and flash message for user feedback
        return redirect()->route('categories.show', $category)->with('success', 'Kategorie erfolgreich erstellt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {   
        $jobs = $category->jobs; // get all realet jobs through dynamic properties/ realtionships methods
        return view("categories.show", ["category" => $category, 'jobs'=>$jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("categories.edit", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $updateCategoryRequest, Category $category)
    {
        
        $validated = $updateCategoryRequest->validated();

        $category->update($validated);

        return redirect()->route('categories.show', $category)->with('success', 'Kategorie erfolgreich aktualisiert');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}