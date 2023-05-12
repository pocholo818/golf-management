<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Http\Requests\ServicesRequest;

class MerchandiseController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prod = Merchandise::paginate(10);
        return view('Admin.merchandise.index',['prod' => $prod]);
        // return view('Admin.merchandise.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.merchandise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        $request->validated($request->all());

        $user = Merchandise::create([
            'name' => $request->get('name'),
            'account_id' => $request->get('account_id'),
            'total' => $request->get('total'),
        ]);

        return redirect()->route('merchandise')->with([
            'success' => 'Merchandise created!'
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
        $prod = Merchandise::find($id);
        if (!$prod ) {
            return redirect()->route('services')->with('error', 'services not found.');
        }
        return view('Admin.merchandise.edit',['prod' => $prod]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, string $id)
    {
        $prod = Merchandise::find($id);
        $input = $request->all();
        $prod->update($input);
        return redirect()->route('merchandise')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Merchandise::destroy($id);
        return back()->with('success','Deleted successfully');
    }
}
