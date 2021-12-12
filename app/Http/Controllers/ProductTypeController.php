<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttype = ProductType::all();
        return response()->json(['producttypes'=>$producttype],200);
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
        ]); 
        
        $producttype = new Producttype;
        $producttype->name = $request->name;
        $producttype->description = $request->description;
        $producttype->save(); 
        return response()->json(['message'=>'Producttype Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producttype = Producttype::find($id);
        if($producttype){
            return response()->json(['producttype'=>$producttype],200);
        }
        else{
            return response()->json(['message'=>'No Producttype Found'],404);
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
        $request->validate([
            'name'=>'required|max:191',
            'description'=>'required|max:191',
        ]); 
        
        $producttype = Producttype::find($id);
        if($producttype){
            $producttype->name = $request->name;
            $producttype->description = $request->description;
            $producttype->update();
            return response()->json(['message'=>'Producttype Update Successfully'],200);
        }
        else{
            return response()->json(['message'=>'Producttype Update Unsuccessfully'],404);
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
        $producttype = Producttype::find($id);
        if($producttype){
            $producttype->delete();
            return response()->json(['message'=>'Producttype Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Producttype Delete Unsuccessfully'],404);
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
        $producttype = Producttype::where('name','like','%'.$name.'%')->get();
        if(count($producttype)){
            return response()->json(['producttype'=>$producttype],200);
        }
        else{
            return response()->json(['message'=>'No Found'],404);
        }
    }
}
