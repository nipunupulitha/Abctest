<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use domain\Facades\CategoryFacade;
use domain\Facades\ProductFacade;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'delete','addProduct', 'product', 'sub']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response['products'] = ProductFacade::all();
        return view('pages.product.index')->with($response);
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
    public function store(ProductRequest $request)
    {
        ProductFacade::store($request->all());
        return redirect()->back()->with('success', 'Product Created successfully');
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product_id)
    {
      $response['product'] = ProductFacade::edit($product_id);
      return view('pages.product.edit')->with($response);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $product_id)
    {
        ProductFacade::update($request->all(), $product_id);
        return redirect()->back()->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $product_id)
    {
        ProductFacade::delete($product_id);
        return redirect()->back()->with('success', 'Product Deleted successfully');
    }

    public function product($category_id)
    {
      $response['category'] =CategoryFacade::get($category_id);
      $response['products'] =CategoryFacade::getProductByCategory($category_id);
      return view('pages.product.index')->with($response);  
    }

    public function all()
    {
        $response['products'] = ProductFacade::all();       
        return view('pages.product.view')->with($response);
    }

    public function sub()
    {
        $categories = Category::all();
        return view('pages.product.store', compact('categories'));
    }

    public function addProduct(ProductRequest $request)
   {
    $product = new Product;
    $product->name = $request->input('name');
    $product->category_id = $request->input('category_id');
    $product->save();
    return redirect()->back()->with('success', 'Product created successfully');
}

}