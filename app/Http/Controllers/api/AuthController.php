<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register Method
    public function register(Request $request)
    {
        //// Validating admin's inputs ////
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed'
        ]);

        //After validation succeeded Store the user in the database
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Creating a token
        $token = $admin->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Admin Registered Successfully!',
            'admin' => new AdminResource($admin),
            'token' => $token,
        ], 200);
    }


    //// Login Method ////
    public function Login(Request $request)
    {
        //Validating credentials
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8'
        ]);

        //Retrieving Admin Data
        $admin = Admin::where('email',$request->email)->first();

        //check the credentials
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'error' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Creating a token
        $token = $admin->createToken('auth-token')->plainTextToken;

        //Return token with accepted response
        return response()->json([
            'message' => 'Admin Login Successfully!',
            'user' => new AdminResource($admin),
            'token' => $token,
        ],200);

    }
}
