<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\produks;
use App\Model\kategori;
use App\Model\penjualan;
use App\Model\konsumen;
use App\Model\detail_penjualan;

class ApiController extends Controller
{

    public function getDetailPenjualan(){
        // $data = detail_penjualan::all();
        // return response()->json($data);
        $data = detail_penjualan::with('konsumen','produks')->get();
        return $data;
        
    }
    public function postDetailPenjualan(Request $request){
        // return $request->all();
        // $data = array (
        //  'nama' => $request->nama,
        //  'qty' => $request->qty,
        //  'harga_beli' => $request->harga_beli,
        //  'harga_jual' => $request->harga_jual,
        //  'id_kategori' => $request->id_kategori
        // );
        $save = detail_penjualan::create($request->all());
        if ($save) {
            $res = array('status' => true, 'message' => 'Detail berhasil disimpan');
        }else {
            $res = array('status' => false, 'message' => 'Detail gagal disimpan');
        }
        return response()->json($res);
    }

    public function getKonsumen(){
        // $data = konsumen::all();
        // return response()->json($data);
        $data = konsumen::with('penjualan','detail_penjualan')->get();
        return $data;
        
    }
    public function postKonsumen(Request $request){
        // return $request->all();
        // $data = array (
        //  'nama' => $request->nama,
        //  'qty' => $request->qty,
        //  'harga_beli' => $request->harga_beli,
        //  'harga_jual' => $request->harga_jual,
        //  'id_kategori' => $request->id_kategori
        // );
        $save = konsumen::create($request->all());
        if ($save) {
            $res = array('status' => true, 'message' => 'konsumen berhasil disimpan');
        }else {
            $res = array('status' => false, 'message' => 'konsumen gagal disimpan');
        }
        return response()->json($res);
    }

    // Penjualan
    public function getPenjualan(){
        // $data = produks::all();
        // return response()->json($data);
        $data = penjualan::with('konsumen','detail_penjualan')->get();
        return $data;
        
    }

	// Produks
    public function getProduks(){
    	// $data = produks::all();
    	// return response()->json($data);
    	$data = produks::with('kategori', 'detail_penjualan')->get();
    	return $data;
    	
    }
    public function getKategori(){
        // $data = produks::all();
        // return response()->json($data);
        $data = kategori::with('produks')->get();
        return $data;
        
    }
    public function getProduk($id){
    	$data = produks::where('id', $id)->with('kategori')->first();
    	return $data;
    	
    }
    public function postPenjualan(Request $request){
        // return $request->all();
        // $data = array (
        //  'nama' => $request->nama,
        //  'qty' => $request->qty,
        //  'harga_beli' => $request->harga_beli,
        //  'harga_jual' => $request->harga_jual,
        //  'id_kategori' => $request->id_kategori
        // );
        $save = penjualan::create($request->all());
        if ($save) {
            $res = array('status' => true, 'message' => 'Penjualan berhasil disimpan');
        }else {
            $res = array('status' => false, 'message' => 'Penjualan gagal disimpan');
        }
        return response()->json($res);
    }
    public function postProduks(Request $request){
    	// return $request->all();
    	// $data = array (
    	// 	'nama' => $request->nama,
    	// 	'qty' => $request->qty,
    	// 	'harga_beli' => $request->harga_beli,
    	// 	'harga_jual' => $request->harga_jual,
    	// 	'id_kategori' => $request->id_kategori
    	// );
    	$save = produks::create($request->all());
    	if ($save) {
    		$res = array('status' => true, 'message' => 'produks berhasil disimpan');
    	}else {
    		$res = array('status' => false, 'message' => 'produks gagal disimpan');
    	}
    	return response()->json($res);
    }
    public function updateProduks($id, Request $request){
    	$save = produks::where('id', $id)->update($request->all());
    	if ($save) {
    		$res = array('status' => true, 'message' => 'produks berhasil diubah');
    	} else {
    		$res = array('status' => false, 'message' => 'produks gagal diubah');
    	}
    	return response()->json($res);
    }

    
}
