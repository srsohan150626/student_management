<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Program;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\MyClass;
use App\Student;
use App\Status;
use App\FileUpload;
use File;
use Storage;
use DB;
class StudentController extends Controller
{
    public function getStudentRegister()
    {
      $programs = Program::all();
      $shift=Shift::all();
      $time =Time::all();
      $batch= Batch::all();
      $group =Group::all();
      $academics = Academic::orderBy('academic_id','DESC')->get();
      $student_id=Student::max('student_id');
      return view('student.studentRegister',compact('programs','academics','shift','time','batch','group','student_id'));
    }

    public function postStudentRegister(Request $request)
    {
      $st = new Student();
      $st->first_name = $request->first_name;
      $st->last_name = $request->last_name;
      $st->sex = $request->sex;
      $st->dob = $request->dob;
      $st->email = $request->email;
      $st->status = $request->status;
      $st->nationality = $request->nationality;
      $st->national_card = $request->national_card;
      $st->passport = $request->passport;
      $st->phone = $request->phone;
      $st->village = $request->village;
      $st->commune = $request->commune;
      $st->district = $request->district;
      $st->province = $request->province;
      $st->current_address = $request->current_address;
      $st->dateregistered	 = $request->dateregistered	;
      $st->user_id = $request->user_id;
      $st->photo = FileUpload::photo($request,'photo');
      if($st->save())
      {
        $student_id = $st->student_id;
        Status::insert(['student_id'=>$student_id,'class_id'=>$request->class_id]);
        return redirect()->route('goPayment',['student_id'=>$student_id]);

      }

    }

    public function studentInfo(Request $request)
    {
      if($request->has('search')){
        $students = Student::where('student_id',$request->search)
                          ->Orwhere('first_name',"LIKE","%".$request->search."%")
                          ->Orwhere('last_name',"LIKE","%".$request->search."%")
                          ->select(DB::raw('student_id,
                                            first_name,
                                            last_name,
                                            CONCAT(first_name," ",last_name) AS full_name,
                                            (CASE WHEN Sex=0 THEN "M" ELSE "F" END) AS Sex,
                                            dob'))
                          ->paginate(4)
                          ->appends('search',$request->search);
      }else{
        $students = Student::select(DB::raw('student_id,
                                             first_name,
                                             last_name,
                                             CONCAT(first_name," ",last_name) AS full_name,
                                             (CASE WHEN Sex=0 THEN "M" ELSE "F" END) AS Sex,
                                             dob'))
                            ->paginate(4);

      }
     return view('student.studentList',compact('students'));
    }
}
