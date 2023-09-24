<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use domain\Facades\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController extends ParentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response['categories'] = CategoryFacade::all();
        return view('pages.category.index')->with($response);
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
        CategoryFacade::store($request->all());
        return redirect()->back()->with('success', 'Category Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $category_id)
    {
        CategoryFacade::delete($category_id);
        return redirect()->back()->with('success', 'Category Deleted successfully');
    }
}
