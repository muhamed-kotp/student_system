<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::get();
        return view('courses.index', compact('courses'));
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $courses = Course::Where('name', 'LIKE', "%$keyword%")->orWhere('code', 'LIKE', "%$keyword%")->get();
        return response()->json($courses);

    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }
}
