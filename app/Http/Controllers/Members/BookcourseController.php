<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCourse;
use App\Models\Appointment;
use App\Models\Course;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Session;

class BookcourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookcourses = BookCourse::all();
        return view('Members.BookCourse.index',['bookcourses' => $bookcourses]);
        // return view('Members.BookCourse.index_book_course');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $courses = Course::find($id);
        
        if (!$courses) {
            return redirect()->route('bookCourse')->with('error', 'bookCourse not found.');
        }

        return view('Members.BookCourse.create',['courses' => $courses]);
        // return view('Members.BookCourse.create_book_course');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(AppointmentRequest $request)
    {
        $request->validated($request->all());
        // check if same date
        if(date('Y-m-d') == $request->date){
            Session::flash('error', 'Same date is invalid');
            return redirect()->back();
        }
        // check if less than current date
        else if($request->date < date('Y-m-d')){
            Session::flash('error', 'Date is less than the current date');
            return redirect()->back();
        }
      // check if greater than current date
            // else if(date('Y', strtotime($request->date)) > date('Y')){
            //     echo "Date is greater than the current year ";
            // }
            // insert
        else{
            
            $appt = Appointment::create([
                'name' => $request->name,
                'capacity' => $request->capacity,
                'date' => $request->date,
                'time' => $request->time,
                'guests' => $request->guests,
                'user_id' => auth('member')->user()->customer_id,
                'status' => $request->status,
            ]);
    
            Session::flash('success', 'Appointment created!');
            return redirect()->route('bookCourse');        
        }
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
        $bookcourses = BookCourse::find($id);

        if (!$bookcourses) {
            return redirect()->route('bookCourse')->with('error', 'bookCourse not found.');
        }

        return view('Members.BookCourse.edit',['bookcourses' => $bookcourses]);
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
