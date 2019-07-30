<?php

namespace App\Http\Controllers;

use App\Model\barang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = barang::all();
        // DB::table("kategori")->get();
        return view("barang.index", compact("data"));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("barang.create");    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        barang::create([
            'kd_barang'=>$request->kd_barang,
            'nm_barang'=>$request->nm_barang,
            'kd_jenis'=>$request->kd_jenis,
            'harga'=>$request->harga
             
        ]);
        return redirect()->route("barang.index");    }

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
        $barang = barang::where("kd_barang", $id)->first();
        return view("barang.edit", compact("barang"));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        barang::where("kd_barang", $id)->update([
            'kd_barang'=>$request->kd_barang,
            'nm_barang'=>$request->nm_barang,
            'kd_jenis'=>$request->kd_jenis,
            'harga'=>$request->harga
        ]);
        return redirect()->route("barang.index");    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $hapus = barang::where('kd_barang', $id)->delete();
        return redirect()->route("barang.index");    }
}
