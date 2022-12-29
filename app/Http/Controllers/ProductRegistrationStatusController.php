<?php

namespace App\Http\Controllers;

use App\Models\ProductRegistrationStatus;
use App\Http\Requests\StoreProductRegistrationStatusRequest;
use App\Http\Requests\UpdateProductRegistrationStatusRequest;

class ProductRegistrationStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreProductRegistrationStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRegistrationStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductRegistrationStatus  $productRegistrationStatus
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRegistrationStatus $productRegistrationStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductRegistrationStatus  $productRegistrationStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRegistrationStatus $productRegistrationStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRegistrationStatusRequest  $request
     * @param  \App\Models\ProductRegistrationStatus  $productRegistrationStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRegistrationStatusRequest $request, ProductRegistrationStatus $productRegistrationStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductRegistrationStatus  $productRegistrationStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRegistrationStatus $productRegistrationStatus)
    {
        //
    }
}
