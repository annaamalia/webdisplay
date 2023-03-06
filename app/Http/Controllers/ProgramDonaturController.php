<?php

namespace App\Http\Controllers;

use App\Models\ProgramDonatur;
use Illuminate\Http\Request;

class ProgramDonaturController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $donatur = new ProgramDonatur();
        $donatur->program_profile_id = $request->program;
        $donatur->nama = $request->nama;
        $donatur->phone_number = $request->nomorhp;
        $donatur->value = $request->jumlah;
        $donatur->status = 0;
        $donatur->rekening = $request->rekening;
        $donatur->comment = ' ';
        $donatur->save();
        $donatur->value = $request->jumlah + $donatur->id;
        $donatur->save();

        return redirect()->route('umum.donatur.show', $donatur->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donatur = ProgramDonatur::findorfail($id);

        return view('programdonatur.show', compact('donatur'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
