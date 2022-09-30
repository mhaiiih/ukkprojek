<?php

namespace App\Http\Controllers;

use App\Models\catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index()
    {
        $catatan = catatan::all();
        return view('catatan.show', compact('catatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required',
        ]);

        catatan::create ([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'suhu_tubuh' => $request->suhu_tubuh,
        ]);

        return redirect('catatan')->with('success','Data Berhasil Di Tambahkan');
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
        $catatan = catatan::findorfail($id);
        return view('catatan.edit',compact('catatan'));
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
        $this->validate($request,[
            'nama' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required',
        ]);

        $catatan = catatan::findorfail($id);
        $catatan->update($request->all());
        return redirect('/catatan')->with('success','Data Berhasil Di Edit');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catatan = catatan::findorfail($id);
        $catatan->delete();
        return back()->with('destroy','Data Berhasil Di Destroy');
    }
}