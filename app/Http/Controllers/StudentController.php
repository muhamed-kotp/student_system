<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([

            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'code' => 'integer|required',
            'date' => 'nullable',
            // 'level_id'=>'exists:levels,id| required'
        ]);

        $students = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'code' => $request->code,
            'date' => $request->date,
            'level_id' => $request->level_id,
        ]);

        return redirect(route('students.index'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $students = Student::Where('name', 'LIKE', "%$keyword%")->orWhere('code', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->get();
        return response()->json($students);

    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([

            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'code' => 'integer|required',
            'date' => 'nullable',
            'level_id' => 'exists:levels,id',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'code' => $request->code,
            'date' => $request->birthDate,
            'level_id' => $request->level_id,
        ]);

        return redirect(route('students.index'));
    }

    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        return redirect(route('students.index'));
    }

}
