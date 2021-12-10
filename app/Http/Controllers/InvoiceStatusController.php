<?php

namespace App\Http\Controllers;

use App\Models\InvoiceStatus;
use App\Http\Requests\StoreInvoiceStatusRequest;
use App\Http\Requests\UpdateInvoiceStatusRequest;

class InvoiceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreInvoiceStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceStatus  $invoiceStatus
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceStatus $invoiceStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceStatus  $invoiceStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceStatus $invoiceStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceStatusRequest  $request
     * @param  \App\Models\InvoiceStatus  $invoiceStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceStatusRequest $request, InvoiceStatus $invoiceStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceStatus  $invoiceStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceStatus $invoiceStatus)
    {
        //
    }
}
