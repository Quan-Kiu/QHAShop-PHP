<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Image = Image::all();
        return response()->json(['Images'=>$Image],200);
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
            'url'=>'required|max:191',
            'product_id'=>'required|max:191',
        ]); 
        
         $Image = new Image;
        $Image->url = $request->url;
        $Image->product_id = $request->product_id;
        $Image->save(); 
        return response()->json(['message'=>'Image Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Image = Image::find($id);
        if($Image){
            return response()->json(['Image'=>$Image],200);
        }
        else{
            return response()->json(['message'=>'No Image Found'],404);
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
        /* $Image = Image::find($id);
        $Image->update($request->all());
        return $Image ;*/
        $request->validate([
            'url'=>'required|max:191',
            'product_id'=>'required|max:191',
        ]); 
        
        $Image = Image::find($id);
        if($Image){
            $Image->url = $request->url;
            $Image->product_id = $request->product_id;
            $Image->update();
            return response()->json(['message'=>'Image Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Image Update Unsuccessfully'],404);
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
        $Image = Image::find($id);
        if($Image){
            $Image->delete();
            return response()->json(['message'=>'Image Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Image Delete Unsuccessfully'],404);
        }
    }
}