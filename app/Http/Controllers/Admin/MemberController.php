<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Members::paginate(10);
        return view('Admin.members.index', ['members' => $members]);
        // return view('Admin.Members.index_members');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $request)
    {
        $request->validated($request->all());

        $member = Members::create([

            'account_code' => strtoupper(Str::random(10)),  //for account code 10 digits
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'mobile_number' => $request->get('mobile_number'), //$request->get('mobile_number'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')), //changed from Hash::make

        ]);
        $member->save();
        return redirect()->route('member')->with([
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
        if (!$members) {
            return redirect()->route('member')->with('error', 'member not found.');
        }
        return view('Admin.members.edit', ['members' => $members]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest $request, string $id)
    {
        $member = Members::find($id);
        $input = $request->all();
        $member->update($input);
        return redirect()->route('member')->with('success', 'Members updated!');
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
