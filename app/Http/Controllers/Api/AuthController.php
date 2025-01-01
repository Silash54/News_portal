<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //return $request;
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]);
        }
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $admin->createToken($request->email)->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'User register successfully',
            'data' => $admin,
            'token' => $token
        ]);
    }
    public function login(Request $request)
    {
        // Validate the input fields
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]);
        }

        // Check if the admin exists and validate the password
        $admin = Admin::where('email', $request->email)->first();
        //return $admin;
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Email or Password incorrect'
            ]);
        }

        // Create a token for the admin
        $token = $admin->createToken($request->email)->plainTextToken;

        // Return the login response
        return response()->json([
            'status' => true,
            'message' => 'User Login successfully',
            'data' => $admin,
            'token' => $token
        ]);
    }
    public function logout()
    {
        $admins=Auth::user();
        $admins->token()->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Logout Successfully'
        ]);
    }
}
