<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCourse;
use App\Models\Appointment;
use App\Models\Customer;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $appt = Appointment::whereHas('customer', function($query) use($keyword){
            return $query->where('first_name', 'last_name', 'email','LIKE','%($keyword)%');
        })
                ->orderBy('app_id','ASC')
                ->paginate(10);

        return view('Admin.appointments.index', ['appt' => $appt]);
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
    public function accept(string $id)
    {
        $request = Appointment::find($id);
        $request->status = 'Accepted';
        $request->save();
        return back()->with('success', 'updated successfully.');
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
    public function decline(string $id)
    {
        $request = Appointment::find($id);
        $request->status = 'Declined';
        $request->save();
        return back()->with('success', 'declined successfully.');
    }
}
