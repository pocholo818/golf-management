<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Members;
use App\Http\Requests\ServicesRequest;

use Str;
use Auth;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prod = Bill::where('type','merchandise')
        ->paginate(10);
        return view('Admin.merchandise.index',['prod' => $prod ]);
    }

    public function find()
    {
        return view('Admin.merchandise.search');
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
        return redirect()->route('create_merchandise')->with(compact('customer'));
        // return view('Admin.kiosk.search', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $kiosk = Members::where('account_code',$id)->first();
        $customer = $request->session()->get('customer');
        return view('Admin.merchandise.create', compact('customer'));
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
            'remarks'=>$request->get('remarks'),
        ]);

        return redirect()->route('merchandise')->with([
            'success' => 'merchandise created!'
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
        $prod  = Bill::find($id);
        if (!$prod  ) {
            return redirect()->route('merchandise')->with('error', 'merchandise not found.');
        }
        return view('Admin.merchandise.edit',['prod' => $prod ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, string $id)
    {
        $prod  = Bill::find($id);
        $input = $request->all();
        $prod ->update($input);
        return redirect()->route('merchandise')->with('success','Updated successfully');
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
