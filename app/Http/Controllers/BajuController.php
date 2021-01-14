<?php

namespace App\Http\Controllers;

use App\Baju;
use Illuminate\Http\Request;

class BajuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Baju::orderByDesc('id')->get();
        return view('baju.index' , [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baju.add');
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
            'nama' => 'required|string|min:2',
            'merk' => 'required|string|min:2',
            'jenis' => 'required|string|min:2',
            'warna' => 'required|string|min:2'
        ]);
        $data = $request->all();
        Baju::create($data);
        return redirect()->route('baju.index')->with('status','Berhasil menambahkan data !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Baju::find($id)->get()->first();
        return view('baju.edit' , [
            'data' => $data
        ]);
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
        $request->validate([
            'nama' => 'required|string|min:2',
            'merk' => 'required|string|min:2',
            'jenis' => 'required|string|min:2',
            'warna' => 'required|string|min:2'
        ]);
        $data = $request->all();
        Baju::findOrFail($id)->update($data);
        return redirect()->route('baju.index')->with('status','Berhasil mengedit data !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Baju::findOrFail($id)->delete();
        return redirect()->route('baju.index')->with('status','Berhasil menghapus data !');
    }
}
