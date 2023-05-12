<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServicesRequest;
use App\Models\Services;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Services::paginate(10);
        return view('Admin.services.index',['service' => $service]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        $request->validated($request->all());

        $user = Services::create([
            'name' => $request->get('name'),
            'account_id' => $request->get('account_id'),
            'total' => $request->get('total'),
        ]);

        return redirect()->route('services')->with([
            'success' => 'Services created!'
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
        $service = Services::find($id);
        if (!$service ) {
            return redirect()->route('services')->with('error', 'services not found.');
        }
        return view('Admin.services.edit',['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, string $id)
    {
        $service = Services::find($id);
        $input = $request->all();
        $service->update($input);
        return redirect()->route('services')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Services::destroy($id);
        return back()->with('success','Deleted successfully');
    }
}
