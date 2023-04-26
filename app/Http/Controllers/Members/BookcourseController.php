<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCourse;
use App\Models\Appointment;
use App\Models\Course;
use App\Http\Requests\AppointmentRequest;
class BookcourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookcourses = BookCourse::all();
        return view('Members.BookCourse.index_book_course',['bookcourses' => $bookcourses]);
        // return view('Members.BookCourse.index_book_course');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $courses = Course::find($id);
        return view('Members.BookCourse.create_book_course',['courses' => $courses]);
        // return view('Members.BookCourse.create_book_course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequest $request)
    {
        // check if same date
        if(date('Y-m-d') == $request->date){
            echo "Same date is invalid";
        }
        // check if less than current date
        else if($request->date < date('Y-m-d')){
            echo "Date is less than the current date";
        }
        // check if greater than current date
        // else if(date('Y', strtotime($request->date)) > date('Y')){
        //     echo "Date is greater than the current year ";
        // }
        // insert
        else{
            $request->validated($request->all());

            $appt = Appointment::create([
                'name' => $request->name,
                'capacity' => $request->capacity,
                'date' => $request->date,
                'time' => $request->time,
                'guests' => $request->guests,
                // 'user_id' => auth()->user()->customer_id,
                'user_id' => auth('member')->user()->customer_id,
            ]);

            $appt->save();

            return redirect()->route('book_course')->with([
                'success' => 'Appointment created!'
            ]);
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
        return view('Members.BookCourse.edit_book_course',['bookcourses' => $bookcourses]);
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
