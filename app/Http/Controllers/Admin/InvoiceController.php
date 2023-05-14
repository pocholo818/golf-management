<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\Bill;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

use Str;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice = Invoice::paginate(10);
        return view('Admin.invoice.index', ['invoice' => $invoice]);
        // return view('Admin.invoice.index');
    }

    public function search(Request $request)
{
    // Get the search value from the request
    $search = $request->input('account_code');
    $from = $request->input('from');
    $to = $request->input('to');

    // Search in the title and body columns from the posts table
    $bill = Bill::query()
        ->whereDate('created_at', '>=', $from)
        ->whereDate('created_at', '<=', $to)
        ->where('account_id', 'LIKE', "%{$search}%")
        ->get();

    $sum = Bill::query()
        ->whereDate('created_at', '>=', $from)
        ->whereDate('created_at', '<=', $to)
        ->where('account_id', 'LIKE', "%{$search}%")
        ->sum('total');

    if (!$search) {
        $bill = '';
    }

    // Redirect to the desired route with the search results
    // return view('Admin.invoice.create')->with(compact('bill', 'sum'));
    return redirect()->route('receipt_preview')->with(compact('bill', 'sum'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.invoice.create');
    }

    public function preview(Request $request)
    {

        // Retrieve the search results from the session
        $bill = $request->session()->get('bill');
        $sum = $request->session()->get('sum');
    
        $uniqueMembers = collect([]);
    
        if ($bill) {
            $uniqueMembers = $bill->unique(function ($item) {
                return $item->member_name . $item->account_id;
            });
        }
    
        return view('Admin.receipt_preview.index', compact('bill', 'sum', 'uniqueMembers'));
    }
    
    

    public function generate(Request $request, $account_id, $sum)
    {
        // Generate random combination of uppercase letters and numbers
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $length = 10;
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        $randomString = strtoupper($randomString);

        // Retrieve the bill using the provided parameters
        $bill = Bill::where('account_id', $account_id)
            ->get();
    
        $uniqueMembers = collect([]);
    
        if ($bill->count() > 0) {
            $uniqueMembers = $bill->unique('member_name');
        }
    
        return view('Admin.generate_receipt.index', compact('bill', 'sum', 'uniqueMembers', 'randomString'));
    }
    
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member = Invoice::create([

            'invoice_number' => $request->get('invoice_number'),  
            'customer_id' => $request->get('customer_id'),
            'member_name' => $request->get('member_name'),
            'total' => $request->get('total'), 

        ]);
        $member->save();
        return redirect()->route('admin_invoice')->with([
            'success' => 'Invoice created!'
        ]);
    }

    public function accept(string $id)
    {
        $request = Invoice::find($id);
        $request->status = 'paid';
        $request->save();
        return back()->with('success', 'updated successfully.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
