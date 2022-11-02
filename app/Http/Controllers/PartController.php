<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\part;
use App\Http\Requests\StorepartRequest;
use App\Http\Requests\UpdatepartRequest;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $part = DB::table('display_final_cam')
        ->join('parts', 'parts.kode', '=', 'display_final_cam.webdisplay_webdisplay_final_cam_CODE_VALUE')
        ->select('display_final_cam.*', 'parts.gambar', 'parts.model')
        ->orderBy('id', 'DESC')
        ->first();
        return view('part.index', [
                'part' => $part,
            ]);
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
     * @param  \App\Http\Requests\StorepartRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StorepartRequest $request)
    // {
    //     $validatedData = $request->validate([
    //         'kode'               =>'required',
    //         'nama_gambar'               =>'required',
    //         'gambar'               =>'required',
    //         'model'               =>'required',
    //     ]);

    //     $part = new Part;
    //     $part->kode = $validatedData['kode'];
    //     $part->nama_gambar = $validatedData['nama_gambar'];
    //     $part->gambar = $validatedData['gambar'];
    //     $part->model = $validatedData['model'];

    //     $part->save();

    //     return redirect()->back();
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $part = Part::all();
        return view('part.edit', [
            'part' => $part,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(part $part)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepartRequest  $request
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'kode'               =>'required',
            'nama_gambar'               =>'required',
            'gambar'               =>'required',
            'model'               =>'required',

        ]);
  
        $part = Part::find($request->get('id'));
        $part->kode = $validatedData['kode'];
        $part->nama_gambar = $validatedData['nama_gambar'];
        $part->gambar = $validatedData['gambar'];
        $part->model = $validatedData['model'];

        $part->save();

        return redirect(route('part.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $part = Part::find($request->get('id'));
        $part->delete();
        return redirect()->back();
    }
}
