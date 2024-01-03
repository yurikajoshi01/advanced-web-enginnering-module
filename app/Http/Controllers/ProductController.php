<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    
    /**
     *
     * Display a listing of the resource.
     */
    public function __construct() {
        //$this->authorizeResource(Product::class, 'product');
    }

    public function index()
    {
        $products = Product::all()->sortBy('artist');
        return view('products',['products'=>$products]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);
        
        $validated = $request -> validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'price' => 'required|numeric',
            'producttype' => 'required|Integer',
        ]);

        $product = new Product;

        $product->product_type_id = $request->producttype;
        $product->artist = $request->artist;
        $product->title = $request->title;
        $product->price = $request->price;
        
        if($request->file('file')!=null){
            $imagename=$request->file('file')->store('public/images');
            $product->imagename=str_replace("public/images/", "", $imagename);
        }

        $product->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        return view('product',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return "PRODUCT DELETED";
    }
}
