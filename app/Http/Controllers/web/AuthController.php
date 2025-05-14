<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    //// Login Method ////
    public function Login(Request $request)
    {
        //Validating credentials
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8'
        ]);


        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }

        Auth::login($admin, $request->remember);
        $request->session()->regenerate();

        return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('auth.register');
    }

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


        auth()->login($admin);

        return redirect('/');

    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }


}
