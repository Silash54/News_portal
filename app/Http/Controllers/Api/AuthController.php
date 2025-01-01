<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return $request;
        $validator=Validator::make($request->all(),
    [
        'name'=>'required',
        'email'=>'required|email',
        'password'
    ]);
    if($validator->fails()){
        return response()->json([
            'status'=>false,
            'message'=>$validator->errors()
        ]);
    }
    $admin=Admin::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password)
    ]);
    return response()->json([
        'status'=>true,
        'message'=>'User register successfully',
        'data'=>$admin
    ]);
    }
}
