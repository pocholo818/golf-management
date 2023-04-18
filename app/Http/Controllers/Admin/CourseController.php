<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index()
    {
// eto
        $course = Course::all();
        return view ('admin.course')->with('courses', $course);

    }

    // Add Course
    public function store(Request $request)
    {

        $photo = $request->file('photo');

        if($request->hasFile('photo')){
            $filenameWithExt = $photo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $image = $filename.'_'.time().'.'.$extension;
            $path = $photo->move('public/course', $image);

        }else{
            $image = 'default.png';
        }

        //
        $courses = new Course();
        $courses->fill($request->all());
        $courses->photo = $image;
        $courses->save();

        return redirect()->route('admin.course')
            ->with('success', 'Course Created!');
    }

    // View Edit
    public function edit($course_id)
    {
        $courses = Course::find($course_id);
        return view('admin.update', compact('courses'));
    }
    //Update
    public function update(Request $request, $course_id)
    {
        $courses = Course::find($course_id);
        $input = $request->all();
        $courses->update($input);
        return redirect('admin.course')->with('flash_message', 'Course Updated!');
    }


    public function destroy($course_id)
    {
        Course::destroy($course_id);
        return redirect('admin.course')->with('flash_message', 'Course removed!');
    }
}
