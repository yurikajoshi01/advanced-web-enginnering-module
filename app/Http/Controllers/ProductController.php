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

    public function index(Request $request)
    {
        // Determine the condition for displaying random products
        $displayRandomProducts = $request->route()->named('home');

        if ($displayRandomProducts) {
            $randomProducts = Product::inRandomOrder()->limit(5)->get();
            return view('home', compact('randomProducts'));
        } else {
            $products = Product::paginate(5);
            return view('products', ['products' => $products, 'request' => $request]);
        }
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

    public function search(Request $request)
    {
        $query = Product::query();

        // Check if a product type is selected for sorting
        if ($request->has('producttype') && $request->producttype !== 'all') {
            $query->where('product_type_id', $request->producttype);
        }

        // Check if a sort order is selected
        if ($request->has('sortOrder')) {
            $sortOrder = $request->sortOrder;
            $query->orderBy('artist', $sortOrder);
        } else {
            // Default sort order (ascending) if not specified
            $query->orderBy('artist', 'asc');
        }

        // Check if a search query is provided
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', '%' . $searchQuery . '%')
                    ->orWhere('artist', 'like', '%' . $searchQuery . '%');
                // Add more fields to search as needed
            });
        }

        $products = $query->paginate(4);

        return view('products', compact('products'));
        
    }

}
