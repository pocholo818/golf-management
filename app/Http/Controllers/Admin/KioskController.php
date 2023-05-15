<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Http\Requests\ServicesRequest;
// use App\Http\Controllers\Admin\Members;
use App\Models\Members;

use Str;
use Auth;

class KioskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kiosk = Bill::where('type','kiosk')
                        ->paginate(10);
        return view('Admin.kiosk.index',['kiosk' => $kiosk]);
    }

    public function find()
    {
        return view('Admin.kiosk.search');
    }


    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $customer = Members::query()
            ->where('customer_id', 'LIKE', "%{$search}%")
            ->orWhere('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%")
            ->orWhere('account_code', 'LIKE', "%{$search}%")
            ->first();
        
        if(!$search){
            $customer = '';
        }
    
        // Return the search view with the resluts compacted
        return redirect()->route('create_kiosk')->with(compact('customer'));
        // return view('Admin.kiosk.search', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $kiosk = Members::where('account_code',$id)->first();
        $customer = $request->session()->get('customer');
        return view('Admin.kiosk.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        $request->validated($request->all());

        $user = Bill::create([
            'bill_code' =>strtoupper(Str::random(10)),  
            'user_id' => Auth::user()->id,
            'member_name' => $request->get('member_name'),
            'account_id' => $request->get('account_id'),
            'type' => Auth::user()->role,
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
        $kiosk = Bill::find($id);
        if (!$kiosk ) {
            return redirect()->route('kiosk')->with('error', 'services not found.');
        }
        return view('Admin.kiosk.edit',['kiosk' => $kiosk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, string $id)
    {
        $kiosk = Bill::find($id);
        $input = $request->all();
        $kiosk->update($input);
        return redirect()->route('kiosk')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Bill::destroy($id);
        return back()->with('success','Deleted successfully');
    }
}
