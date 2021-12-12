<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Supplier = Supplier::all();
        return response()->json(['Suppliers'=>$Supplier],200);
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
            'email'=>'required|max:191',
            'phone'=>'required|max:191',
        ]); 
        
         $Supplier = new Supplier;
        $Supplier->name = $request->name;
        $Supplier->email = $request->email;
        $Supplier->phone = $request->phone;
        $Supplier->save(); 
        return response()->json(['message'=>'Supplier Add Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Supplier = Supplier::find($id);
        if($Supplier){
            return response()->json(['Supplier'=>$Supplier],200);
        }
        else{
            return response()->json(['message'=>'No Supplier Found'],404);
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
        /* $Supplier = Supplier::find($id);
        $Supplier->update($request->all());
        return $Supplier ;*/
        $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|max:191',
            'phone'=>'required|max:191',
        ]); 
        
        $Supplier = Supplier::find($id);
        if($Supplier){
            $Supplier->name = $request->name;
            $Supplier->email = $request->email;
            $Supplier->phone = $request->phone;
            $Supplier->update();
            return response()->json(['message'=>'Supplier Update Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Supplier Update Unsuccessfully'],404);
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
        $Supplier = Supplier::find($id);
        if($Supplier){
            $Supplier->delete();
            return response()->json(['message'=>'Supplier Delete Successfully'],200); 
        }
        else{
            return response()->json(['message'=>'Supplier Delete Unsuccessfully'],404);
        }
    }
}
