<?php

namespace App\Http\Controllers;

use App\Models\SubPart;
use App\Http\Requests\StoreSubPartRequest;
use App\Http\Requests\UpdateSubPartRequest;

class SubPartController extends Controller
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
     * @param  \App\Http\Requests\StoreSubPartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubPartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubPart  $subPart
     * @return \Illuminate\Http\Response
     */
    public function show(SubPart $subPart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubPart  $subPart
     * @return \Illuminate\Http\Response
     */
    public function edit(SubPart $subPart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubPartRequest  $request
     * @param  \App\Models\SubPart  $subPart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubPartRequest $request, SubPart $subPart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubPart  $subPart
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubPart $subPart)
    {
        //
    }
}
