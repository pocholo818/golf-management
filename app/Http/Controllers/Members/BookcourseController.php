<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Bookcourse;
use Illuminate\Http\Request;

class BookcourseController extends Controller
{
    //
    public function index()
    {
        $bookcourses = Bookcourse::all();
        return view('members.bookcourse',['bookcourses' => $bookcourses]);
        // return view('members.bookcourse');
    }
}
