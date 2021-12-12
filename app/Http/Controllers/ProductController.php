<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return response()->json(['products'=>$product],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name'=>'required|max:191',
            'description'=>'required|max:191',
            'product_type_id'=>'required|max:191',
            'supplier_id'=>'required|max:191',
            'price'=>'required|max:191',
            'stock'=>'required|max:191',
        ]); 
        
         $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->product_type_id = $request->product_type_id;
        $product->supplier_id = $request->supplier_id;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save(); 
        return response()->json(['message'=>'Product Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json(['product'=>$product],200);
        }
        else{
            return response()->json(['message'=>'No Product Found'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* $product = Product::find($id);
        $product->update($request->all());
        return $product ;*/
        $request->validate([
            'name'=>'required|max:191',
            'description'=>'required|max:191',
            'product_type_id'=>'required|max:191',
            'supplier_id'=>'required|max:191',
            'price'=>'required|max:191',
            'stock'=>'required|max:191',
        ]); 
        
        $product = Product::find($id);
        if($product){
            $product->name = $request->name;
            $product->description = $request->description;
            $product->product_type_id = $request->product_type_id;
            $product->supplier_id = $request->supplier_id;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->update();
            return response()->json(['message'=>'Product Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Product Update Unsuccessfully'],404);
        }

       
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json(['message'=>'Product Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Product Delete Unsuccessfully'],404);
        }
    }
    /**
     * Search a got name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $product = Product::where('name','like','%'.$name.'%')->get();
        if(count($product)){
            return response()->json(['products'=>$product],200);
        }
        else{
            return response()->json(['message'=>'No Found'],404);
        }
    }
}
