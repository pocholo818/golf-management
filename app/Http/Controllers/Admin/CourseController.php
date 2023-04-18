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
        return view('admin.course');
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
            $path = $photo->move('public/images', $image);

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


    // View
    public function show($id)
    {
        $courses = Course::find($id);
        return view('web.article.view')->with('articles', $articles);
    }

    // View Edit
    public function edit($id)
    {
        $courses = Course::find($id);
        return view('web.article.update', compact('articles'));
    }
    //Update
    public function update(Request $request, $id)
    {
        $courses = Course::find($id);
        $input = $request->all();
        $courses->update($input);
        return redirect('web.article.home')->with('flash_message', 'Article Updated!');
    }


    public function destroy($id)
    {
        Course::destroy($id);
        return redirect('web.article.home')->with('flash_message', 'Article deleted!');
    }
}
