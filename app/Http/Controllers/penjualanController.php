<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\penjualan;
use App\Model\detail_penjualan;
use App\Model\konsumen;
use App\Model\produks;

class penjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(konsumen $post)
    {
        $konsumen = konsumen::all();
        $data = penjualan::all();
        return view("penjualan.index", compact('post','konsumen','data'));

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(konsumen $post)
    {

        $konsumen = konsumen::all();
        return view("penjualan.create", compact('post','konsumen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = penjualan::create([
            'id' =>$request->id,
            'konsumen_id' =>$request->konsumen_id,
            'tanggal' =>$request->tanggal        

        ]);
        return redirect()->route("penjualan.show", ['id' => $data->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = penjualan::findOrFail($id);
        $produks = produks::all();
        return view('penjualan.show') ->with('data',$data)
        ->with('produks',$produks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, konsumen $post)
    {
        $konsumen = konsumen::all();
        $penjualan = penjualan::where('id' ,$id)->first();
        return view("penjualan.edit", compact('penjualan','post','konsumen'));
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
        penjualan::where('id' ,$id)->update([
            'id' =>$request->id,
            'kategori_id' =>$request->kategori_id,
            'produks_id' =>$request->produks_id,
            'jumlah' =>$request->jumlah,
            'tanggal' =>$request->tanggal
        ]);
        return redirect()->route("penjualan.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        penjualan::destroy($id);
        return redirect()->route("penjualan.index");
    }
}
