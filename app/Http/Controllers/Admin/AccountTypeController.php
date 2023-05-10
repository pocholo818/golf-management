<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Models\User;
use Str;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usertype = User::whereIn('role',
                    ['finance' ,'kiosk' ,'services', 'merchandise'])
                    ->paginate(10);
            if (!$usertype) {
             return redirect()->route('account')->with('error', 'user not found.');
            }
        return view('Admin.account.index',['usertype' => $usertype]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([
            'account_code' => strtoupper(Str::random(10)),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => bcrypt($request->get('password')),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),

        ]);
        $user->save();
        return redirect()->route('account')->with([
            'success' => 'Members created!'
        ]);
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
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('account')->with('error', 'user not found.');
        }
        return view('Admin.account.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        return redirect()->route('account')->with('success', 'Members updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return back()->with('success', 'Deleted successfully.');
    }
}
