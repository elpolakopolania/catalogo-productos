<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validateLogin($request);

        // Login true
        if(Auth::attempt($request->only('email','password'))){
            return response()->json([
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'message' => 'success'
            ]);
        }

        // Login false

        return  response()->json([
            'message' => 'Unauthorized'
        ],401);
    }

    public function logout (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'User Sucessfully logged out'
        ], 200);
    }

    public function validateLogin(Request $request){
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
    }
}
