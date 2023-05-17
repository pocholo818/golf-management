<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $invoice = Invoice::where('customer_id',auth('member')->user()->account_code)->get();
    //   dd($invoice);
        return view('Members.invoice.index',['invoice'=>$invoice]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return redirect()->route('invoice')->with('error', 'invoice not found.');
        }
        return view('Members.invoice.show',['invoice' => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     */

     
   public function payment(string $id)
    {
        $request = Invoice::find($id);
        $request->status = 'paid';
        $request->save();
        return redirect()->route('invoice')->with('success', 'updated successfully.');
    }

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
