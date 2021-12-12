<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserType = UserType::all();
        return response()->json(['UserTypes'=>$UserType],200);
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
        ]); 
        
         $UserType = new UserType;
        $UserType->name = $request->name;
        $UserType->save(); 
        return response()->json(['message'=>'UserType Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $UserType = UserType::find($id);
        if($UserType){
            return response()->json(['UserType'=>$UserType],200);
        }
        else{
            return response()->json(['message'=>'No UserType Found'],404);
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
        /* $UserType = UserType::find($id);
        $UserType->update($request->all());
        return $UserType ;*/
        $request->validate([
            'name'=>'required|max:191',
        ]); 
        
        $UserType = UserType::find($id);
        if($UserType){
            $UserType->name = $request->name;
            $UserType->update();
            return response()->json(['message'=>'UserType Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'UserType Update Unsuccessfully'],404);
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
        $UserType = UserType::find($id);
        if($UserType){
            $UserType->delete();
            return response()->json(['message'=>'UserType Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'UserType Delete Unsuccessfully'],404);
        }
    }
}