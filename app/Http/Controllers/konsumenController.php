<?php

namespace App\Http\Controllers;

use App\Model\konsumen;
use Illuminate\Http\Request;

class konsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = konsumen::all();
        // DB::table("kategori")->get();
        return view("konsumen.index", compact("data"));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $konsumen = konsumen::all();
        return view("konsumen.create", compact("konsumen"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new \App\User;
        $user->role='konsumen';
        $user->name=$request->nama_konsumen;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
        $user->remember_token=str_random(60);
        $user->save();
        //doctor
        $request->request->add(['user_id'=>$user->id]);
        $data=konsumen::create($request->all());
        return redirect()->route("konsumen.index");
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
        $konsumen = konsumen::where("id", $id)->first();
        return view("konsumen.edit", compact("konsumen"));
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
         konsumen::where("id", $id)->update([
            'id'=>$request->id,
            'nama_konsumen'=>$request->nama_konsumen,
            'jk'=>$request->jk,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat
        ]);
        return redirect()->route("konsumen.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        konsumen::destroy($id);
        return redirect()->route("konsumen.index");
    }
}
