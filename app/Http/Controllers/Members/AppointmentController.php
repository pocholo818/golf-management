<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appt = Appointment::where('user_id',auth('member')->user()->customer_id)->get();
        return view('Members.Appointment.index',['appt' => $appt]);
        // return view('Members.Appointment.index_appointment');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appt = Appointment::find($id);

        if (!$appt) {
            return redirect()->route('appointment')->with('error', 'Appointment not found.');
        }

        return view('Members.Appointment.edit',['appt' => $appt]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentRequest $request, string $id)
    {
        $appt = Appointment::find($id);
        $input = $request->all();
        $appt->update($input);
        return redirect()->route('appointment')->with('success', 'Members updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Appointment::destroy($id);
        return back()->with('success', 'Deleted successfully.');
    }
}
