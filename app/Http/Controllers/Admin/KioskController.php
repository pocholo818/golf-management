<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kiosk;
use App\Http\Requests\ServicesRequest;

class KioskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prod = Kiosk::paginate(10);
        return view('Admin.kiosk.index',['prod' => $prod]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.kiosk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        $request->validated($request->all());

        $user = Kiosk::create([
            'name' => $request->get('name'),
            'account_id' => $request->get('account_id'),
            'total' => $request->get('total'),
        ]);

        return redirect()->route('kiosk')->with([
            'success' => 'kiosk created!'
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
        $prod = Kiosk::find($id);
        if (!$prod ) {
            return redirect()->route('kiosk')->with('error', 'services not found.');
        }
        return view('Admin.kiosk.edit',['prod' => $prod]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, string $id)
    {
        $prod = Kiosk::find($id);
        $input = $request->all();
        $prod->update($input);
        return redirect()->route('kiosk')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kiosk::destroy($id);
        return back()->with('success','Deleted successfully');
    }
}
