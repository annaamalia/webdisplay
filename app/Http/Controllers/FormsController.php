<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\part;
use App\Http\Requests\StoreFormsRequest;
use App\Http\Requests\UpdateFormsRequest;


class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $part = Part::all();
        return view('part.form', [
            'part' => $part,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreFormsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormsRequest $request)
    {
        $validatedData = $request->validate([
            'kode'                =>'required',
            'namagambar'          =>'required',
            'gambar'              =>'image|file|max:4096',
            'model'               =>'required',
        ]);

        if($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('post-images'); 
        }

        // if($request->file('gambar')) {
        //     $validatedData['gambar'] = $request->file('gambar')->storeAs('post-images', $validatedData['gambar']); 
        // }

        $part = new Part;
        $part->kode = $validatedData['kode'];
        $part->namagambar = $validatedData['namagambar'];
        $part->gambar = $validatedData['gambar'];
        $part->model = $validatedData['model'];

        $part->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $part = Part::find($request->get('id'));
        return view('part.edit', [
            'part' => $part,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormsRequest  $request
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormsRequest $request, Part $part)
    {
        $validatedData = $request->validate([
            'kode'               =>'required',
            'namagambar'               =>'required',
            'gambar'               =>'required',
            'model'               =>'required',

        ]);
  
        $part = Part::find($request->get('id'));
        $part->kode = $validatedData['kode'];
        $part->namagambar = $validatedData['namagambar'];
        $part->gambar = $validatedData['gambar'];
        $part->model = $validatedData['model'];

        $part->save();

        return redirect(route('part.form'));

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
