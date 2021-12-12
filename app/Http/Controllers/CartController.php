<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = cart::all();
        return response()->json(['carts'=>$cart],200);
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
            'product_id'=>'required|max:191',
            'user_id'=>'required|max:191',
            'description'=>'required|max:191',
            'quantity'=>'required|max:191',
        ]); 
        
        $cart = new Cart;
        $cart->product_id = $request->product_id;
        $cart->user_id = $request->user_id;
        $cart->description = $request->description;
        $cart->quantity = $request->quantity;
        $cart->save(); 
        return response()->json(['message'=>'cart Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::find($id);
        if($cart){
            return response()->json(['cart'=>$cart],200);
        }
        else{
            return response()->json(['message'=>'No cart Found'],404);
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
        /* $cart = cart::find($id);
        $cart->update($request->all());
        return $cart ;*/
        $request->validate([
            'product_id'=>'required|max:191',
            'user_id'=>'required|max:191',
            'description'=>'required|max:191',
            'quantity'=>'required|max:191',
        ]); 
        
        $cart = cart::find($id);
        if($cart){
            $cart->product_id = $request->product_id;
            $cart->user_id = $request->user_id;
            $cart->description = $request->description;
            $cart->quantity = $request->quantity;
            $cart->update();
            return response()->json(['message'=>'cart Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'cart Update Unsuccessfully'],404);
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
        $cart = cart::find($id);
        if($cart){
            $cart->delete();
            return response()->json(['message'=>'cart Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'cart Delete Unsuccessfully'],404);
        }
    }
}
