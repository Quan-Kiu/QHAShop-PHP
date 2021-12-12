<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Size = Size::all();
        return response()->json(['Sizes'=>$Size],200);
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
            'product_id'=>'required|max:191',
        ]); 
        
         $Size = new Size;
        $Size->name = $request->name;
        $Size->product_id = $request->product_id;
        $Size->save(); 
        return response()->json(['message'=>'Size Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Size = Size::find($id);
        if($Size){
            return response()->json(['Size'=>$Size],200);
        }
        else{
            return response()->json(['message'=>'No Size Found'],404);
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
        /* $Size = Size::find($id);
        $Size->update($request->all());
        return $Size ;*/
        $request->validate([
            'name'=>'required|max:191',
            'product_id'=>'required|max:191',
        ]); 
        
        $Size = Size::find($id);
        if($Size){
            $Size->name = $request->name;
            $Size->product_id = $request->product_id;
            $Size->update();
            return response()->json(['message'=>'Size Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Size Update Unsuccessfully'],404);
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
        $Size = Size::find($id);
        if($Size){
            $Size->delete();
            return response()->json(['message'=>'Size Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Size Delete Unsuccessfully'],404);
        }
    }
}
