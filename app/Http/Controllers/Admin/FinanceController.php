<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Http\Requests\ServicesRequest;

use Str;
use Auth;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finance = Bill::where('type', 'finance')
            ->paginate(10);
        return view('Admin.finance.index', ['finance' => $finance]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.finance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        //

        $request->validated($request->all());

        $user = Bill::create([
            'bill_code' => strtoupper(Str::random(10)),
            'user_id' => Auth::user()->id,
            'member_name' => $request->get('member_name'),
            'account_id' => $request->get('account_id'),
            'type' => Auth::user()->role,
            'total' => $request->get('total'),
        ]);

        return redirect()->route('finance')->with([
            'success' => 'finance created!'
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
        //
        $finance = Bill::find($id);
        if (!$finance) {
            return redirect()->route('finance')->with('error', 'services not found.');
        }
        return view('Admin.finance.edit', ['finance' => $finance]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, string $id)
    {
        //
        $finance = Bill::find($id);
        $input = $request->all();
        $finance->update($input);
        return redirect()->route('finance')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Bill::destroy($id);
        return back()->with('success', 'Deleted successfully');
    }
}
