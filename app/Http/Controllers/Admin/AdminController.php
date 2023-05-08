<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('Admin.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function authenticated(Request $request)
    {
        if(auth()->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
            // dd(['email' => $request->get('email'), 'password' => $request->get('password')]);
        if(in_array(auth()->user()->role,['finance'])){
            return redirect()->route('transaction');
        }
        if(in_array(auth()->user()->role,['kiosk'])){
            return redirect()->route('kiosk');
        }
        if(in_array(auth()->user()->role,['services'])){
            return redirect()->route('services');
        }
        if(in_array(auth()->user()->role,['merchandise'])){
            return redirect()->route('merchandise');
        }

            return redirect()->route('member');
        }
            // dd("warning","wrong credentials");
            return redirect()->back()->with("warning","wrong credentials");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-admin');
    }
}
