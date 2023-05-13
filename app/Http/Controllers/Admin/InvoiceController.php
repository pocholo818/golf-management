<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.invoice.index');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('account_code');
        $from = $request->input('from');
        $to = $request->input('to');
    
        // Search in the title and body columns from the posts table
        $bill = Bill::query()
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at',  '<=', $to)
            ->where('account_id', 'LIKE', "%{$search}%")
            // ->sum('total')
            // ->where('account_code', 'LIKE', "%{$search}%")

            
            // ->where('customer_id', 'LIKE', "%{$search}%")
            // ->orWhere('first_name', 'LIKE', "%{$search}%")
            // ->orWhere('last_name', 'LIKE', "%{$search}%")
            // ->orWhere('account_code', 'LIKE', "%{$search}%")
            ->get();
        
        $sum = Bill::query()
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at',  '<=', $to)
            ->where('account_id', 'LIKE', "%{$search}%")
            ->sum('total');

        if(!$search){
            $bill = '';
        }
    
        // Return the search view with the resluts compacted
        return view('Admin.invoice.create', compact('bill'), compact('sum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.invoice.create');
    }

    public function preview()
    {
        return view('Admin.receipt_preview.index');
    }

    public function generate()
    {
        return view('Admin.generate_receipt.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
