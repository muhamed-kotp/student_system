<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Student;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(){
        $levels = Level::get();
        return view('levels.index',compact('levels'));
    }

    public function create(){
        return view('levels.create');
}

public function store(Request $request)

{
   $validator = $request->validate( [

    'name'=> 'required|string|max:100',
    'description'=> 'required|string',
    'number'=> 'integer|required'
   ]) ;


    $levels=  Level::create([
        'name' => $request->name,
        'description' => $request->description,
        'number' => $request->number,
    ]);

    return redirect(route('levels.index')) ;
}

public function show($id) {
    $level = Level::findOrFail($id);
    $students = Student::get();
    return view('levels.show',[
        'level' => $level,
        'students'=> $students
    ]);
}
}
