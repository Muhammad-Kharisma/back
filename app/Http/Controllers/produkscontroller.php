<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\produks;
use App\Model\kategori;
class produkscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(produks $post)
    {
        // $data = DB::table("produks")->get();
        $data = produks::all();
        $kategori = kategori::all();
        return view ("produks.index", compact('post','data','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(produks $post)
    {
        $kategori = kategori::all();
        return view("produks.create", compact('post', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $data=produks::create($request->all());
        if ($request->hasFile('gambar')) {
            # code...
            $request->file('gambar')->move('css_admin/img/',$request->file('gambar')->getClientOriginalName());
            $data->gambar=$request->file('gambar')->getClientOriginalName();
            $data->save();
        }

     return redirect()->route("produks.index");
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
    public function edit($id, produks $post)
    {
        $kategori = kategori::all();
        $produks= produks::where('id' ,$id)->first();
        return view("produks.edit", compact('produks','post','kategori'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=produks::find($id);
        $data->update($request->all());
        if ($request->hasFile('gambar')) {
            # code...
            $request->file('gambar')->move('css_admin/img/',$request->file('gambar')->getClientOriginalName());
            $data->gambar=$request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route("produks.index");    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        produks::destroy($id);
        return redirect()->route("produks.index");
    }
}
