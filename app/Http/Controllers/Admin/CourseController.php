<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $courses = Course::paginate(10);
        return view('Admin.course.index',['courses' => $courses]);
        // return view('Admin.Course.course');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
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

        $courses = Course::create([
            'name' => $request->name,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'photo' => $request->photo,
        ]);
        $courses->photo = $image;
        $courses->save();

        return redirect()->route('course')->with('success', 'Course created!');

        // return back()->with('success', 'Course created successfully.');
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
        $courses = Course::find($id);
        // dd($courses);
        return view('Admin.course.edit',['courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        $photo = $request->file('photo');
    
        if ($request->hasFile('photo')) {
            $filenameWithExt = $photo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $image = $filename.'_'.time().'.'.$extension;
            $path = $photo->move('public/course', $image);
    
            $courses = Course::find($id);
            // dd($courses);
            $old_image_path = public_path().'/public/course/'.$courses->photo;
            // dd($old_image_path);
            if (File::exists($old_image_path)) {
                File::delete($old_image_path);
            }
            $courses->photo = $image;
            $courses->update($request->all());
            // dd($courses);
        } else {
            $courses = Course::findOrFail($id);
            $courses->update($request->except('photo'));
        }
    
        return redirect()->route('course')->with('success', 'Course updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::destroy($id);
        return back()->with('success', 'Successfully deleted');
    }
}
