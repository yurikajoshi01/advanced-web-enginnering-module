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
        $products = Product::orderBy('artist')->paginate(4); // Adjust the number based on your requirement
    
        return view('products', compact('products')); // Match the view name with the existing 'products.blade.php'
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
        $producttypes=ProductType::all()->sortBy('type');
        return view('products-edit',['product'=>$product, 'producttypes'=>$producttypes]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request -> validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'price' => 'required|numeric',
            'producttype' => 'required|Integer',
        ]);

        $product->artist = $request->artist;
        $product->title = $request->title;
        $product->price = $request->price*100;
        $product->product_type_id = $request->producttype;


        $product->save();
        return Redirect::route('index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(["msg"=>"success"]);
    }
}
