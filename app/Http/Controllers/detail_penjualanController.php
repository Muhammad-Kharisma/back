<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\detail_penjualan;
use App\Model\penjualan;
use App\Model\konsumen;
use App\Model\produks;

class detail_penjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = detail_penjualan::all();
        return view("detail_penjualan.index", compact('data'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(penjualan $post1, produks $post2)
    {
        $penjualan = penjualan::all();
        $produks = produks::all();
        return view("detail_penjualan.create", compact('post1','post2','penjualan','produks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = detail_penjualan::create([
            'penjualan_id'=>$request->penjualan_id,
            'produks_id'=>$request->produks_id,
            'jumlah'=>$request->jumlah
        ]);
        return redirect()->route("penjualan.show", ['id' => $data->penjualan_id]);
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
    public function edit($id, penjualan $post1, produks $post2)
    {
       $penjualan = penjualan::all();
       $produks = produks::all();
       $detail_penjualan= detail_penjualan::where('id' ,$id)->first();
       return view("detail_penjualan.edit", compact('detail_penjualan','post1','post2','penjualan','produks'));
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
        detail_penjualan::where('id' ,$id)->update([
            'id'=>$request->id,
            'id_penjualan'=>$request->id_penjualan,
            'id_produks'=>$request->id_produks,
            'jumlah'=>$request->jumlah      
        ]);
        return redirect()->route("detail_penjualan.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // $t = penjualan::all();
        // $data=detail_penjualan::destroy($id);

        //  return redirect()->route("penjualan.show",['id' => $t->penjualan_id]);
       $hapus = detail_penjualan::where('id', $id)->delete();
       return redirect()->route("penjualan.index"); 
   }
}
