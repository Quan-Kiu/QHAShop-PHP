<?php

namespace App\Http\Controllers;

use App\Models\InvoiceStatus;
use Illuminate\Http\Request;

class InvoiceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InvoiceStatus = InvoiceStatus::all();
        return response()->json(['InvoiceStatuss'=>$InvoiceStatus],200);
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
            'type'=>'required|max:191',
            'name'=>'required|max:191',
        ]); 
        
        $InvoiceStatus = new InvoiceStatus;
        $InvoiceStatus->type = $request->type;
        $InvoiceStatus->name = $request->name;
        $InvoiceStatus->save(); 
        return response()->json(['message'=>'InvoiceStatus Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $InvoiceStatus = InvoiceStatus::find($id);
        if($InvoiceStatus){
            return response()->json(['InvoiceStatus'=>$InvoiceStatus],200);
        }
        else{
            return response()->json(['message'=>'No InvoiceStatus Found'],404);
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
        /* $InvoiceStatus = InvoiceStatus::find($id);
        $InvoiceStatus->update($request->all());
        return $InvoiceStatus ;*/
        $request->validate([
            'type'=>'required|max:191',
            'name'=>'required|max:191',
        ]); 
        
        $InvoiceStatus = InvoiceStatus::find($id);
        if($InvoiceStatus){
            $InvoiceStatus->type = $request->type;
            $InvoiceStatus->name = $request->name;
            return response()->json(['message'=>'InvoiceStatus Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'InvoiceStatus Update Unsuccessfully'],404);
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
        $InvoiceStatus = InvoiceStatus::find($id);
        if($InvoiceStatus){
            $InvoiceStatus->delete();
            return response()->json(['message'=>'InvoiceStatus Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'InvoiceStatus Delete Unsuccessfully'],404);
        }
    }
}
