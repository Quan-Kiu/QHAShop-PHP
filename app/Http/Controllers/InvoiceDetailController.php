<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InvoiceDetail;

class InvoiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InvoiceDetail = InvoiceDetail::all();
        return response()->json(['InvoiceDetails'=>$InvoiceDetail],200);
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
            'invoice_id'=>'required|max:191',
            'quantity'=>'required|max:191',
            'unit_price'=>'required|max:191',
            'stock'=>'required|max:191',
        ]); 
        
         $InvoiceDetail = new InvoiceDetail;
        $InvoiceDetail->product_id = $request->product_id;
        $InvoiceDetail->invoice_id = $request->invoice_id;
        $InvoiceDetail->quantity = $request->quantity;
        $InvoiceDetail->supplier_id = $request->unit_price;
        $InvoiceDetail->description = $request->description;
        $InvoiceDetail->save(); 
        return response()->json(['message'=>'InvoiceDetail Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $InvoiceDetail = InvoiceDetail::find($id);
        if($InvoiceDetail){
            return response()->json(['InvoiceDetail'=>$InvoiceDetail],200);
        }
        else{
            return response()->json(['message'=>'No InvoiceDetail Found'],404);
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
        /* $InvoiceDetail = InvoiceDetail::find($id);
        $InvoiceDetail->update($request->all());
        return $InvoiceDetail ;*/
        $request->validate([
            'product_id'=>'required|max:191',
            'invoice_id'=>'required|max:191',
            'quantity'=>'required|max:191',
            'unit_price'=>'required|max:191',
            'stock'=>'required|max:191',
        ]); 
        
        $InvoiceDetail = InvoiceDetail::find($id);
        if($InvoiceDetail){
            $InvoiceDetail->product_id = $request->product_id;
            $InvoiceDetail->invoice_id = $request->invoice_id;
            $InvoiceDetail->quantity = $request->quantity;
            $InvoiceDetail->supplier_id = $request->unit_price;
            $InvoiceDetail->description = $request->description;
            $InvoiceDetail->update();
            return response()->json(['message'=>'InvoiceDetail Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'InvoiceDetail Update Unsuccessfully'],404);
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
        $InvoiceDetail = InvoiceDetail::find($id);
        if($InvoiceDetail){
            $InvoiceDetail->delete();
            return response()->json(['message'=>'InvoiceDetail Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'InvoiceDetail Delete Unsuccessfully'],404);
        }
    }
}
