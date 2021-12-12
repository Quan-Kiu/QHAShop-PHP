<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color = Color::all();
        return response()->json(['colors'=>$color],200);
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
        
        $color = new color;
        $color->name = $request->name;
        $color->product_id = $request->product_id;
        $color->save(); 
        return response()->json(['message'=>'color Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $color = color::find($id);
        if($color){
            return response()->json(['color'=>$color],200);
        }
        else{
            return response()->json(['message'=>'No color Found'],404);
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
        /* $color = color::find($id);
        $color->update($request->all());
        return $color ;*/
        $request->validate([
            'name'=>'required|max:191',
            'product_id'=>'required|max:191',
        ]); 
        
        $color = color::find($id);
        if($color){
            $color->name = $request->name;
            $color->product_id = $request->product_id;
            $color->update();
            return response()->json(['message'=>'color Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'color Update Unsuccessfully'],404);
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
        $color = color::find($id);
        if($color){
            $color->delete();
            return response()->json(['message'=>'color Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'color Delete Unsuccessfully'],404);
        }
    }
}
