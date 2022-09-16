<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        if(!is_null($students)){
            return response()->json(['data'=>$students]);
        }else{
            return response()->json(['result'=>"no data found!"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => "required",
            'father_name' => "required",
            'city' => "required",
            'fees' => "required"

        ]);
        $student = Student::create([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'city' => $request->city,
            'fees' => $request->fees
        ]);

        return response()->json(['status'=>"successfully inserted student details",'data'=>$student]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = Student::find($id);
        if(!is_null(($student))){
            return response()->json(['status'=>"successfully fetched student details", 'result'=>$student]);
        }else{
            return response()->json(['status'=>'no data found!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, $id)
    {
        //
        $student = Student::find($id);
        if(!is_null($student)){
            $request->validate([
                'name' => 'required',
                'father_name' => 'required',
                'city' => 'required',
                'fees' => 'required',
            ]);

            $student->update($request->all());

            return response()->json(['status'=>"successfully updated",'result'=>$student]);
        }else{
            return response()->json(['result'=>"no data found for update"],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
