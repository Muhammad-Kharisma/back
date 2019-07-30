<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\konsumen;
use App\User;



class ApiKonsumenController extends Controller
{
    //
    public function postKonsumen(Request $request)
    {
    	# code...
    	$user=new \App\User;
        $user->role='konsumen';
        $user->name=$request->nama_konsumen;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
        $user->remember_token=str_random(60);
        $user->save();
        $request->request->add(['user_id'=>$user->id]);
        $data=konsumen::create($request->all());

        return response()->json($data);
    }

}
