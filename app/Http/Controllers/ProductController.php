<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$productos = Category::find(2)->product()->get();
        return view('sgcc.product.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sgcc.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        
        $datos = $request->validated();
        $supplier = Product::create($datos);
        return redirect()->route('product.index')->with('success', 'The Product has been created');

        /* $product = new Product([

            'code' => $request->code,
            'name' => $request->name,
            'tradename' => $request->tradename,
            'description' => $request->description,
            'brand' => $request->brand,
            'quantity_min' => $request->quantity_min,
            'quantity_max' => $request->quantity_max,
            'barcode' => $request->barcode,
            'category_id' => $request->category_id,
            'status' => $request->status

        ]);

        $product->save(); */

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::with('category')->findOrFail($product->id);
        
        return view('sgcc.product.show',compact('product')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('sgcc.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $datos = $request->validated();

        $d = [

            'code' => $request->code,
            'name' => $request->name,
            'tradename' => $request->tradename,
            'description' => $request->description,
            'brand' => $request->brand,
            'quantity_min' => $request->quantity_min,
            'quantity_max' => $request->quantity_max,
            'barcode' => $request->barcode,
            'category_id' => $request->category_id,
            'status' => $request->status

        ];

        $product->update($d);

        return redirect()->route('product.index')->with('success','successfully upgraded Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success','The Product has been deleted');
    }

    public function destroyindex(Request $request)
    {
        $product = Product::find($request->delete_id);
        if ($product){
            $product->delete();
            return redirect()->route('product.index')->with('success','The Product has been deleted');
        } 
    }
}
