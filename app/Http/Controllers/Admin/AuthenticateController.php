<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthenticateController extends Controller
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
            $auth = auth()->user();
            switch($auth->role){
                case 'finance':
                    return redirect()->route('transaction');
                    break;
                case 'kiosk':
                    return redirect()->route('kiosk');
                    break;
                    case 'finance':
                    return redirect()->route('services');
                    break;
                case 'merchandise':
                    return redirect()->route('merchandise');
                    break;
                default:
                    return redirect()->route('member');
                    break;
            }
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
        return redirect()->route('login_admin');
    }
}
