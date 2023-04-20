<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Members::all();
        return view('admin.members',['members' => $members]);
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
    public function store(Request $request)
    {
        $member = new Members;
        $member->first_name = $request->input('first_name');
        $member->last_name = $request->input('last_name');
        $member->mobile_number = $request->input('mobile_number');
        $member->email = $request->input('email');
        $member->password = Hash::make($request->input('password'));
        $member->save();
    
        return back()->with('success', 'Course created successfully.');
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
        $member = Members::find($id);
        $input = $request->all();
        $member->update($input);
        return back()->with('success', 'Course created successfully.');
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
