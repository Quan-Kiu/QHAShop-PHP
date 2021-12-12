<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Comment = Comment::all();
        return response()->json(['Comments'=>$Comment],200);
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
            'content'=>'required|max:191',
            'rating'=>'required|max:191',
            'product_id'=>'required|max:191',
        ]); 
        
        $Comment = new Comment;
        $Comment->content = $request->content;
        $Comment->rating = $request->rating;
        $Comment->product_id = $request->product_id;
        $Comment->save(); 
        return response()->json(['message'=>'Comment Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Comment = Comment::find($id);
        if($Comment){
            return response()->json(['Comment'=>$Comment],200);
        }
        else{
            return response()->json(['message'=>'No Comment Found'],404);
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
        /* $Comment = Comment::find($id);
        $Comment->update($request->all());
        return $Comment ;*/
        $request->validate([
            'content'=>'required|max:191',
            'rating'=>'required|max:191',
            'product_id'=>'required|max:191',
        ]); 
        
        $Comment = Comment::find($id);
        if($Comment){
            $Comment->content = $request->content;
            $Comment->rating = $request->rating;
            $Comment->product_id = $request->product_id;
            $Comment->update();
            return response()->json(['message'=>'Comment Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Comment Update Unsuccessfully'],404);
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
        $Comment = Comment::find($id);
        if($Comment){
            $Comment->delete();
            return response()->json(['message'=>'Comment Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Comment Delete Unsuccessfully'],404);
        }
    }
}
