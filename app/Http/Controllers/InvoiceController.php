<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Invoice = Invoice::all();
        return response()->json(['Invoices'=>$Invoice],200);
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
            'user_id'=>'required|max:191',
            'shipping_address'=>'required|max:191',
            'shipping_phone'=>'required|max:191',
            'total'=>'required|max:191',
            'delivery_date'=>'required|max:191',
            'invoice_status_id'=>'required|max:191', 
        ]); 
        
         $Invoice = new Invoice;
        $Invoice->user_id = $request->user_id;
        $Invoice->shipping_address = $request->shipping_address;
        $Invoice->shipping_phone = $request->shipping_phone;
        $Invoice->total = $request->total;
        $Invoice->delivery_date = $request->delivery_date;
        $Invoice->invoice_status_id = $request->invoice_status_id;
        $Invoice->save(); 
        return response()->json(['message'=>'Invoice Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Invoice = Invoice::find($id);
        if($Invoice){
            return response()->json(['Invoice'=>$Invoice],200);
        }
        else{
            return response()->json(['message'=>'No Invoice Found'],404);
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
        /* $Invoice = Invoice::find($id);
        $Invoice->update($request->all());
        return $Invoice ;*/
        $request->validate([
            'user_id'=>'required|max:191',
            'shipping_address'=>'required|max:191',
            'shipping_phone'=>'required|max:191',
            'total'=>'required|max:191',
            'delivery_date'=>'required|max:191',
            'invoice_status_id'=>'required|max:191', 
        ]); 
        
        $Invoice = Invoice::find($id);
        if($Invoice){
            $Invoice->user_id = $request->user_id;
            $Invoice->shipping_address = $request->shipping_address;
            $Invoice->shipping_phone = $request->shipping_phone;
            $Invoice->total = $request->total;
            $Invoice->delivery_date = $request->delivery_date;
            $Invoice->invoice_status_id = $request->invoice_status_id;
            $Invoice->update();
            return response()->json(['message'=>'Invoice Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Invoice Update Unsuccessfully'],404);
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
        $Invoice = Invoice::find($id);
        if($Invoice){
            $Invoice->delete();
            return response()->json(['message'=>'Invoice Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Invoice Delete Unsuccessfully'],404);
        }
    }
}
