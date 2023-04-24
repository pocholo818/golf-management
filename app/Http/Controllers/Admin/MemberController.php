<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Members::all();
        return view('Admin.Members.index_members',['members' => $members]);
        // return view('Admin.Members.index_members');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Members.create_members');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $request)
    {
        $request->validated($request->all());

        $member = Members::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        $member->save();
        return redirect()->route('manage_member')->with([
            'success' => 'Members created!'
        ]);
        
        // return back()->with('success', 'Course created successfully.');
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
        $members = Members::find($id);
        return view('Admin.Members.edit_members',['members' => $members]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest $request, string $id)
    {
        $member = Members::find($id);
        $input = $request->all();
        $member->update($input);
        return redirect()->route('manage_member')->with('success', 'Members updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Members::destroy($id);
        return back()->with('success', 'Deleted successfully.');
    }
}
