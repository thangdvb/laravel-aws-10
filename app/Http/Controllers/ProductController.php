<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $path = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension  = $request->file('image')->getClientOriginalExtension(); //This is to get the extension of the image file just uploaded
            $image_name = time() . '_' . $request->name . '.' . $extension;
            $path = $request->file('image')->storeAs(
                'images/product',
                $image_name,
                's3'
            );
            // $path = Storage::disk('s3')->put('images/product' . $image_name, $file, 'public');
            // dd($path);
            // $url = Storage::disk('s3')->url($path);
            // dd($url);
        }
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path,
        ]);
        return redirect()->back()->with([
            'message' => "Product create successfully",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
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
        //
    }
}
