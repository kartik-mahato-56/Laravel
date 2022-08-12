<?php

namespace App\Http\Controllers;



use App\Models\Student;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\QualificationController;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;
use PhpParser\JsonDecoder;
use PhpParser\Node\Expr\Cast\String_;

use App\Mail;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Qualification::all();
        // $student = DB::table('students')
        // ->join('qualifications','students.qid', '=','qualifications.id')
        // ->select('students.id','students.name', 'students.email','students.phone', 'qualifications.qualification')
        // ->get();
        $student = DB::table('students')
                    ->orderByDesc('students.id')
                    ->get();


        return view('signup',['data'=>$data,'students'=>$student]);

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
        //ifStudent already exist then this section will call by update route andStudent data will be updated
     
        if($request->id != ""){
            $student =Student::find($request->id);
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->qualification_id = implode(',',$request->course);

            if ($request->hasFile('profile_image')) {
                $file_type = $request->file('profile_image')->extension();
                $filename = time().".".$file_type;
                $image_path = public_path('uploads/students/');
                unlink($image_path.$student->profile_image);
                $request->file('profile_image')->move(public_path('uploads/students/'), time() . '.' . $file_type);
                $student->profile_image = $filename;
            }
            
            $student->update();
            return redirect('/')->with('message', 'Successfully updated student details');
        }
        else{

            // insert new student details to the database
            $request->validate(
                [
                    "firstName"=>"required",
                    "lastName"=> "required",
                    "email" =>"email | required | unique:students",
                    "phone" => "required | unique:students",
                    "password" => "required",
                    "profile_image"=>'required | mimes:jpeg,png,jpg | max:2048'
                    
                ]
            ); 
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->password = Hash::make($request->password);
            $student->qualification_id = implode(',',$request->course);

            if ($request->hasFile('profile_image')) {
                $file_type = $request->file('profile_image')->extension();
                $file_path = time().".".$file_type;
                $request->file('profile_image')->move(public_path('uploads/students'), time() . '.' . $file_type);
                $student -> profile_image = $file_path;
              }
              
            $student->save();
            return back()->with('message', 'Student Details Submitted!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student, $id)
    {
        //
            $student = Student::find($id);
            
            $data = Qualification::all();

            return view('update',['student'=>$student,'data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student,$id)
    {

        $student = Student::find($id);
        $student->delete();
        $destination = public_path('uploads/students/'. $student->profile_image);
        File::delete($destination);
        return back()->with('message', 'Data deleted successfully');
    }

}
